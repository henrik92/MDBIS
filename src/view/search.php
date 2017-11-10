<!--SEARCH-->
<div class="container text-center top-distance">
    <h2>Rate your favourite movie</h2><br>
    <form id="search" action="" method="post">
        <input class="input-lg" style="width: 40%" name="title" type="text" placeholder="Enter your title here...">
        <button name="submit_search" type="submit" value="search" class="btn btn-success">Search</button>
    </form>
    <br>
    <hr>
</div>

<!--VALIDATE INPUT-->
<?php
if (!empty($_POST['title']) and isset($_POST["submit_search"])) {

    $title = ucwords(strtolower($_POST['title']));

    require 'lib/aws_config.php';

    /* Get Parameters for Item */
    $tableName = 'Movies';
    $error = "";

    $key = $marshaler->marshalJson('
    {
       "title": "' . $title . '"
    }
');

    $params = [
        'TableName' => $tableName,
        'Key' => $key
    ];

    try {
        /* Get DynamoDB Item */
        $result = $dynamodb->getItem($params);

        if (empty($result['Item'])) {
            ?>
            <div class="container text-center">
                <h4>Movie: <b>"<?php echo $title; ?>"</b> not found in our Collection. We are sorry :(</h4>
            </div>
            <?php
            $error = "Movie not found. Try again.";
        } else {

            /* Unmarshal DynamoDB Item to JSON File */
            $item = $marshaler->unmarshalJson($result['Item']);
            /* Convert JSON File to Array */
            $data = json_decode($item, true);
            ?>
            <div class="container text-center">
                <h4><u>Search result for "<b><?php echo $title ?>" : </b></u></h4>
            </div>
            <?php
        }
    } catch (DynamoDbException $e) {
        $error = "Unable to connect to Database. Ask the Admin for help.";
    }

    if ($error == "") {
        ?>

        <div class="container" style="background-color: lightgrey; border: 1px solid black; border-radius: 5px;">  
            <div class=" movie-view-image"> 
                <img src="<?php echo $data['info']['image_url'] ?>" width="800" height="600"/>
            </div>
            <div class="movie-view-description" > 
                <br>
                <ul>
                    <li><h1><u><?php echo $data['title']; ?></u></h1></li>
                    <li><p><b>Year:</b> <?php echo $data['year']; ?></p></li>
                    <li><p><b>Genre:</b> <?php echo implode(" , ", $data['info']['genres']); ?></p></li> 
                    <li><p><b>Actors:</b> <?php echo implode(" , ", $data['info']['actors']); ?></p></li> 
                    <li><p><b>Director:</b> <?php echo implode(" , ", $data['info']['directors']); ?></p></li> 
                    <li><p><b>Plot:</b><br> <?php echo $data['info']['plot']; ?></p></li>
                </ul>
                <br>
            </div>
            <div class="movie-view-rating"> 
                <br>
                <h3>Rating: <b><?php echo $data['info']['rating']; ?> / 10 </b></h3>
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
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" and empty($_POST['title']) and isset($_POST["submit_search"])) {
    ?>
    <div class="container text-center">
        <h4>Enter some title please.</h4>
    </div>

<?php } ?>
                    