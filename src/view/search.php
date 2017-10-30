<!--SEARCH-->
<div class="container text-center top-distance">
    <h2>Rate your favourite movie</h2><br>
    <form action="" method="post">
        <input class="input-lg" style="width: 40%" name="title" type="text" placeholder="Enter your title here...">
        <button name="submit" type="submit" class="btn btn-success">Search</button>
    </form>
    <br>
    <hr>
</div>

<!--VALIDATE INPUT-->
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['title'] != "") {

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

            if ($result['Item'] == "") {
                $error = "Movie not found. Try again.";
            } else {

                /* Unmarshal DynamoDB Item to JSON File */
                $item = $marshaler->unmarshalJson($result['Item']);
                /* Convert JSON File to Array */
                $data = json_decode($item, true);
            }
        } catch (DynamoDbException $e) {
            $error = "Unable to connect to Database. Ask the Admin for help.";
        }
        ?>
        <div class="container text-center">
            <h4><u>Search result for "<b><?php echo $title ?>" : </b></u></h4>
        </div>

        <?php
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
                    <h1>Rating: <b><?php echo $data['info']['rating']; ?> / 10 </b></h1>
                    <br>
                    <hr>
                    <form action="" method="post">
                        <input class="input-sm" style="width: 10%" name="rating" type="text"/>/10
                        <br><br>
                        <button name="submit" type="submit" class="btn btn-success">Submit my Rating</button>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="container text-center">
                <br>
                 <h3 style="color: darkred;"<b><?php echo $error; ?></b></h3>
                <br>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container text-center">
            <h3 style="color: darkred;"><b>Error: please enter a specific title of a movie you like.</b></h3>
        </div>
    <?php }
}
?>


<!-- TO - DO:
    Query DB
    Autocompleten
    Show Movie Title Overview
-->