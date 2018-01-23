<?php

use Aws\DynamoDb\Marshaler;

require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
require $_SERVER["DOCUMENT_ROOT"] . '/lib/es_config.php';
require $_SERVER["DOCUMENT_ROOT"] . '/lib/aws_config.php';

if (!empty($_POST['movie_user_rating'])
) {

    $current_rating = $_POST['movie_current_rating'];
    $old_rank = $_POST['movie_rank'];
    $current_count = $_POST['movie_counter'];

    $user_rating = $_POST['movie_user_rating'];
    $movie_title = $_POST['movie_title'];

    $new_score;
    $new_rank;
    $new_counter;

    $tableName = 'Movies';

    if (filter_var($user_rating, FILTER_VALIDATE_INT) && ($user_rating <= 10 && $user_rating > 0)) {
//        /* UPDATE DB */
//
//       $marshaler = new Marshaler();
//        $new_counter = ($current_count + 1);
//        $new_score = (($current_rating * $current_count) + $user_rating) / ($new_counter);
//
//       $key = $marshaler->marshalJson('
//               {
//              "title" : ' . $movie_title . '
//                  }
//}
//            ');
//
//        $update = $marshaler->marshalJson('{
//               ":s" : ' . $new_score . ', 
//               ":c" : ' . $new_counter . '}');
//
//        $db_params = array(
//            'TableName' => $tableName,
//            'Key' => $key,
//            'ExpressionAttributeValues' => $update,
//            'UpdateExpression' =>
//            'SET rating.rating_value = :s, rating.rating_counter = :c',
//            'ReturnValues' => 'UPDATED_NEW'
//        );
//
//        try {
//            $this->$dynamodb->updateItem($db_params
//                    array(
//                        'TableName' => $tableName,
//                        'Key' => array(
//                            'title' => array(
//                                'S' => $movie_title)),
//                        'AttributeUpdates' => array(
//                            'Rating.rating_counter' => array(
//                                'Value' => array (
//                                    'S' => (String)$new_score
//                                )
//                            ),
//                            'Rating.rating_value' => array(
//                                'Value' => array (
//                                    'S' => (String)$new_counter
//                                )
//                            )
//                        ),
//                        "ReturnValues" => "UPDATED_NEW"
//                    )
//            );
//        } catch (DynamoDbException $e) {
//            echo "Unable to update item:\n";
//            echo $e->getMessage() . "\n";
//        }
//        echo $key;    
//        echo $update;
        echo 'success';
    } else {
        echo "invalid";
    }
}
//function setNewRating($title, $score, $counter, $table, $marshaler, $dynamodb){
//            $key = $marshaler->marshalJson('
//                {
//                "title" : ' . $title . '
//                }
//            ');
//
//            $update = $marshaler->marshalJson('{
//               ":s" : ' . $score . ', 
//               ":c" : ' . $counter . ',   
//            }');
//
//            $db_params = [
//                'TableName' => $table,
//                'Key' => $key,
//                'UpdateExpression' =>
//                'set rating.rating_value = :s, rating.rating_counter=:c',
//                'ExpressionAttributeValues' => $update,
//                'ReturnValues' => 'UPDATED_NEW'
//            ];
//
//            try {
//                $result = $dynamodb->updateItem($db_params);
//            } catch (DynamoDbException $e) {
//                echo "Unable to update item:\n";
//                echo $e->getMessage() . "\n";
//            }
//
//            return 'success';
//}
//
//function setNewRank($title, $rank, $score) {
//    $prev_rank = ($rank - 1);
//    $prev_score = getScorebyRank($prev_rank);
//    $next_rank = ($rank + 1);
//    $next_score = getScorebyRank($next_rank);
//        
//    if($score > $prev_score){
//        $tmp_rank = $rank;
//        $rank = $prev_rank;
//        $prev_rank = $tmp_rank;
//        return;
//    } else if ($score < $next_score){
//        
//    } else {
//        
//    }
//}
//
////GETS SCORE OF PREV./NEXT RANK 
//function getScorebyRank($rank) {
//    $es_score_params = [
//        'index' => 'movies',
//        'type' => 'movie',
//        'body' => [
//            'query' => [
//                'match' => [
//                    'rating_rank' => $rank
//                ]
//            ]
//        ]
//    ];
//    $es_score_result = $elastic_client->search($es_score_params);
//    
//    if(!empty($es_score_result['hits']['hits'][0]['_source']['rating_value'])){
//    $score_result = $es_score_result['hits']['hits'][0]['_source']['rating_value'];
//    return $score_result;
//    
//    } else {
//        echo 'none';
//    }
//}
?>