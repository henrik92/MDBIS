<!--SEARCHFIELD-->
<div class="container text-center top-distance">
    <h2>Rate your favourite movie</h2><br>
    <form id="search" action="" method="post">
        <input class="input-lg" style="width: 40%" name="title" type="text" placeholder="Enter your title here...">
        <button name="submit_search" type="submit" value="search" class="btn btn-success">Search</button>
    </form>
    <br>
    <hr>
</div>

<!--SEARCH-SUGGESTIONS-->
<?php
if (!empty($_POST['title']) and isset($_POST["submit_search"])) {

    $es_title = ucwords(strtolower($_POST['title']));

    /* ELASTICSEARCH */
    require 'lib/es_config.php';


    if (isset($es_title)) {
        $params = [
            'index' => 'movies',
            'type' => 'movie',
            'body' => [
                'query' => [
                    'match' => [
                        'title' => $es_title
                    ]
                ]
            ]
        ];
        $results = $elastic_client->search($params);
    }

    if (!empty($results)) {
        ?>
        <div class="container text-center" id="suggestion">
            <h4>After hard searching we found a total of <?php echo $results['hits']['total'] ?> hits for your search request: <b>"<?php echo $es_title; ?>"</b>:</h4><br>
            <ul>
                <?php
                for ($i = 0; $i < $results['hits']['total']; $i++) {
                    $elastic_title = $results['hits']['hits'][$i]['_source']['title'];
                    echo '<li><a href="index.php?site=rating&movie=' . $elastic_title . '">' . $elastic_title . '</a></li>';
                }
                ?> 
            </ul>
        </div>
    <?php
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST" and empty($_POST['title']) and isset($_POST["submit_search"])) {
    ?>
    <div class="container text-center">
        <h4>Enter some title please.</h4>
    </div>
<?php
}

/* SHOW MOVIE INFORMATION */
    // GET MOVIE INFORMATIONS FROM DATABASE
if (isset($_GET['movie'])) {
   require 'lib/aws_config.php';
   
    $db_title = $_GET['movie'];
    $tableName = 'Movies';
    
    $key = $marshaler->marshalJson('
    {
       "title": "' . $db_title . '"
    }
');

    $params = [
        'TableName' => $tableName,
        'Key' => $key
    ];

    try {
        /* Get DynamoDB Item */
        $db_result = $dynamodb->getItem($params);
    } catch(DynamoDbException $e) {
     echo 'Cant pull Movie Informations out of Database . $e .';   
    }
        if (!empty($db_result['Item'])) {
            /* Unmarshal DynamoDB Item to JSON File */
            $item = $marshaler->unmarshalJson($db_result['Item']);
            /* Convert JSON File to Array */
            $data = json_decode($item, true);
            ?>


<div class="container" id="<?php echo $_GET['movie'] ?>" style="background-color: lightgrey; border: 1px solid black; border-radius: 5px;">  
            <div class=" movie-view-image"> 
                <img src="<?php echo $data['info']['image_url'] ?>" width="800" height="600"/>
            </div>
            <div class="movie-view-description" > 
                <br>
                <ul>
                    <li><h1><u><?php echo $data['title']; ?></u></h1></li>
                    <li><p><b>Year:</b> <?php echo $data['info']['year']; ?></p></li>
                    <li><p><b>Genre:</b> <?php echo implode(" , ", $data['info']['genres']); ?></p></li> 
                    <li><p><b>Actors:</b> <?php echo implode(" , ", $data['info']['actors']); ?></p></li> 
                    <li><p><b>Director:</b> <?php echo implode(" , ", $data['info']['directors']); ?></p></li> 
                    <li><p><b>Plot:</b><br> <?php echo $data['info']['plot']; ?></p></li>
                </ul>
                <br>
            </div>
            <div class="movie-view-rating"> 
                <br>
                <ul class="text-left">
                    <li><h3><u>User-Rating:</u></h3></li>
                    <li><h4>Score: <b><?php echo $data['rating']['rating_value']; ?> / 10 Stars</b></h4>
                    <li><h4>Rank: #<b><?php echo $data['rating']['rating_rank']; ?></b></h4>
                    <li><h4>Rated: <b><?php echo $data['rating']['rating_counter']; ?> times. </b></h4>
                </ul>
                <br>
                <hr>
                <form action="js/search_submit_rating.php" id="movie_rating" method="post">
                    <input id="mov_rating" style="width: 20%;" name="movie_rating" /><b> / 10 Stars</b>
                    <br><br>
                    <input id="mov_title" type="hidden" name="movie_title" value="<?php echo $data['title'] ?>">
                    <button id="submitrating" onclick="submitrating();" name="submit_rating" type="submit" value="rating" class="btn btn-success">Submit my Rating</button>
                </form>
                <br>
                <b><h5 style="color:red;" id="result"></h5></b>
            </div>
        </div>

        <?php
        if (isset($_POST['movie_rating']) and isset($_POST['movie_title'])) {
            $rating = $_POST['movie_rating'];
            $title = $_POST['movie_title'];

            if (filter_var($int, FILTER_VALIDATE_FLOAT) === 0 || !filter_var($int, FILTER_VALIDATE_FLOAT) === false) {
                /* TODO */
                $rating_item = array(
                    'title' => $title,
                    'rating' => $rating
                );
                $json_rating = json_encode($rating_item);

                $tableName = "Rating";
                $params = [
                    'TableName' => $tableName,
                    'Item' => $marshaler->marshalJson($json_rating)
                ];

                try {
                    $result = $dynamodb->putItem($params);
                    echo "Added item: $title\n";
                } catch (DynamoDbException $e) {
                    echo "Unable to add item:\n";
                    echo $e->getMessage() . "\n";
                }
                echo "success";
            } else {
                echo "invalid";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" and empty($_POST['movie_rating']) and isset($_POST["submit_rating"])) {
            echo "none";
        }
    }

}
          
