<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'lib/es_config.php';
require 'lib/aws_config.php';

const PAGE_LIMIT = 50;
 if (!isset($_GET['page'])) {
    $page = 1;
} 
if ($page < 1) {
    $page = 1;
} 
$query_all = '{
           "query" : {
                "match_all" : {}
        }, 
            "sort" : {
                "rating_rank" : {
                    "order" : "asc"}
            }
    }';


$params = [
    'index' => 'movies',
    'type' => 'movie',
    'body' => $query_all
];
$results = $elastic_client->search($params);
$total_movies_in_db = $results['hits']['total'];
$total_number_of_pages = ceil($total_movies_in_db / PAGE_LIMIT);
?>

<div class="container" style="border: 1px solid black">
    <div class="row">
        <div class="col-sm-6" style="text-align: left">
            <h4>There are <b><?php echo $total_movies_in_db ?></b> movies in our Collection.</h4>
        </div>
        <div class="col-sm-6 text-center" style="text-align: right">
            Sort by: 
            <select name="sort">
                <option selected value="rating_desc">Rating high..low</option>
                <option value="rating_asc">Rating low..high</option>
                <option value="alphabetical">Alphabetical A..Z</option>
                <option value="year_desc">Year high..low</option>
                <option value="year_asc">Year low..high</option>
            </select>
            <button class="btn btn-sm btn-success" name="filter">Change the order</button>
        </div>

        <hr>
    </div>   
</div>
<hr>
<br>
<div class="container" style="border-bottom: 1px solid black">
    <div class="row">
        <div class="col-sm-4 text-center" >
            <?php echo '<a href="index.php?site=all&page=' . ($page - 1) . '">Previous Page</a>' ?>
        </div>
        <div class="col-sm-4 text-center">
            <h5><b><?php echo $page ?> / <?php echo $total_number_of_pages ?></b></h5>
        </div>
        <div class="col-sm-4 text-center">
            <?php echo '<a href="index.php?site=all&page=' . ($page + 1) . '">Next Page</a>' ?>
        </div>
        <hr>
    </div>   
</div>

<div class="container text-center">
    <?php echo print_r($results); ?>
</div>