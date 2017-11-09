<?php

if (isset($_POST['movie_rating']) and isset($_POST['movie_title'])) {
        $rating = $_POST['movie_rating'];
        $title = $_POST['movie_title'];
        
        if ($rating === ""){
            echo 'none';
        } else {
        
        if (filter_var($rating, FILTER_VALIDATE_INT) && ($rating <= 10 && $rating > 0)) {
             echo "success";
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
        }
    } 
    ?>