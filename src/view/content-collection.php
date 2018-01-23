<div class="jumbotron text-center">
    <h2>Browse our fantastic collection!</h2>
</div>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//REQUIRES
require 'lib/es_config.php';
require 'lib/aws_config.php';

//VARIABLES
const PAGE_LIMIT = 40;
const ROW_LIMIT = 4;

//GET SORT AND ORDER
if((!isset($_GET['sort_by'])) || (!isset($_GET['order_by']))){
    $sort = 'rating_rank';
    $order = 'asc';
} else {
    $sort = $_GET['sort_by'];
    $order = $_GET['order_by']; 
    }

//SET PAGE VARIABLE FOR PAGINATION
if (!isset($_GET['page'])) {
    $page = 1;
} else if ($_GET['page'] == 0) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
if ($page < 1) {
    $page = 1;
}
//DATABASE INTERVALL
$from = ($page - 1) * PAGE_LIMIT;
$size = PAGE_LIMIT;

//QUERY DATABASE: GET ALL MOVIES
$query_total = '{
    "from" : ' . $from . ', '
        . '"size" :' . $size . ',
           "query" : {
                "match_all" : {}
        }, 
            "sort" : {
                "'. $sort . '" : {
                    "order" : "' . $order . '"}
            }
    }';


$params = [
    'index' => 'movies',
    'type' => 'movie',
    'body' => $query_total
];
$total_result = $elastic_client->search($params);

//CALCULATE/DEFINE -TOTAL AMOUNT OF MOVIES AND PAGENUMBER
$total_movies_in_db = $total_result['hits']['total'];
$total_number_of_pages = ceil($total_movies_in_db / PAGE_LIMIT);
?>



<!--HEADER: SHOW TOTAL MOVIES AND SORT/ODER SELECTION-->
<div class="container">
    <div class="row">
        <div class="col-sm-6" style="text-align: left">
            <h4>There are <b><?php echo $total_movies_in_db ?></b> movies in our Collection.</h4>
        </div>
        <div class="col-sm-6 text-center" style="text-align: right">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="site" value="collection"/>   
                <b>Sort by:</b>
             <select name="sort_by">
                 <option 
                     <?php if($sort == "rating_rank"){
                         echo 'selected';
                     }?> 
                     value="rating_rank">Ranking</option>
                 <option 
                     <?php if( $sort == "rating_value" ){
                         echo 'selected';
                     }?> 
                     value="rating_value">Score</option>
                 <option
                     <?php if($sort == "rating_counter"){
                         echo 'selected';
                     }?> 
                     value="rating_counter">Amount of ratings</option>
             </select>
                <b>Order by:</b>
             <select name="order_by">
                 <option
                     <?php if($order == "asc"){
                         echo 'selected';
                     }?> 
                     value="asc">ascending</option>
                 <option
                     <?php if($order == "desc"){
                         echo 'selected';
                     }?> 
                     value="desc">descending</option>
             </select>
            <button class="btn btn-sm btn-success" type="submit">Change the order</button>
            </form>
       </div>

        <hr>
    </div>   
</div>
<br>



<!--PAGECONTROL-TOP-->
<div class="container" >
    <div class="row">
        <br>
        <div class="col-sm-4 text-center" >
            <?php
            if ($page == 1) {
                echo '<a href="index.php?site=collection&page=' . ($page) . '"><u><i class="fa fa-caret-left  fa-2x" aria-hidden="true"></i>
<b>Previous Page</b></u></a>';
            } else {
                echo '<a href="index.php?site=collection&page=' . ($page - 1) . '"><u><i class="fa fa-caret-left  fa-2x" aria-hidden="true"></i>
<b>Previous Page</b></u></a>';
            }
            ?>
        </div>
        <div class="col-sm-4 text-center">
            <h5><b>Page <?php echo $page ?> / <?php echo $total_number_of_pages ?></b></h5>
        </div>
        <div class="col-sm-4 text-center">
            <?php echo '<a href="index.php?site=collection&page=' . ($page + 1) . '"><u><b>Next Page</b> <i class="fa fa-caret-right fa-2x" aria-hidden="true"></i>
</u></a>' ?>
        </div>
    </div>   
</div>

<!--RESULT SET-->  
<div class="container col-container">
    <?php
    $i = 0;
    $j = 0;
    
    while ($i < PAGE_LIMIT) {
        if (empty($total_result['hits']['hits'][$j])) {
            $j++;
        } else {
            
            //GET IMAGE URL FROM DATABASE
            require 'lib/aws_config.php';

            $title = $total_result['hits']['hits'][$j]['_source']['title'];
            $tableName = 'Movies';
            $image_key = $marshaler->marshalJson('{
                 "title": "' . $title . '"
            }');
            $image_params = [
                'TableName' => $tableName,
                'Key' => $image_key
            ];
            $image_result = $dynamodb->getItem($image_params);
            $temp_result = $marshaler->unmarshalJson($image_result['Item']);
            $image_data = json_decode($temp_result, true);
            
            //Create New Row if already displayed none or four Movies
            if(($i % ROW_LIMIT == 0) || ($i == 0)){
               echo '<div class="row col-container">';
            }
            ?>
            
            <div class="col-sm-3 col">
                <div class="row col-container">
                    <div class="col-sm-4 col">
                        <?php if(!empty($image_data['info']['image_url'])){
                        echo '<img src="' .$image_data['info']['image_url'].'"/>';
                        } else {
                        echo '<h1>MISSING COVER</h1>'; 
                        }?>
                    </div>
                    <div class="col-sm-8 col">
                        <ul>
                            <li><h4><u><b><?php echo $total_result['hits']['hits'][$j]['_source']['title']; ?></b></u></h4></li>
                            <li><br></li>
                            <li>RANK #<?php echo $total_result['hits']['hits'][$j]['_source']['rating_rank'] ?></li>
                            <li>Score:<?php echo $total_result['hits']['hits'][$j]['_source']['rating_value'] ?></li>
                            <li>Rated <?php echo $total_result['hits']['hits'][$j]['_source']['rating_counter'] ?> times</li>
                            <li><br></li>
                            <li><button><?php echo '<a href="index.php?site=search&movie=' . $title . '">More Details</a>' ?></button></li>
                        </ul>
                    </div>
                </div>
                </div>
        <?php
        $i++;
        $j++;
           if($i % ROW_LIMIT == 0){
        echo '</div>';
    }
    } 
    
            }   
    ?>
            
</div>
<br>
<div class="container" >
    <div class="row">
        <br>
        <div class="col-sm-4 text-center" >
            <?php
            if ($page == 1) {
                echo '<a href="index.php?site=collection&page=' . ($page) . '"><u><i class="fa fa-caret-left  fa-2x" aria-hidden="true"></i>
<b>Previous Page</b></u></a>';
            } else {
                echo '<a href="index.php?site=collection&page=' . ($page - 1) . '"><u><i class="fa fa-caret-left  fa-2x" aria-hidden="true"></i>
<b>Previous Page</b></u></a>';
            }
            ?>
        </div>
        <div class="col-sm-4 text-center">
            <h5><b>Page <?php echo $page ?> / <?php echo $total_number_of_pages ?></b></h5>
        </div>
        <div class="col-sm-4 text-center">
            <?php echo '<a href="index.php?site=collection&page=' . ($page + 1) . '"><u><b>Next Page</b> <i class="fa fa-caret-right fa-2x" aria-hidden="true"></i>
</u></a>' ?>
        </div>
    </div>   
</div>