<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'vendor/autoload.php';

date_default_timezone_set('Europe/Berlin');

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

$sdk = new Aws\Sdk([
    'endpoint' => 'http://localhost:8002',
    'region' => 'eu-central-1',
    'version' => 'latest'
        ]);

$dynamodb = $sdk->createDynamoDb();
$marshaler = new Marshaler();

$tableName = 'Movies';

$title = 'Avatar';
$rating = 5.6;

$rating_item = array(
                                     'title' => $title,
                                     'rating' => $rating
                                 );
                                 $json_rating = json_encode($rating_item);

$item = $marshaler->marshalJson($json_rating);

$params = [
    'TableName' => 'Rating',
    'Item' => $item
];


try {
    $result = $dynamodb->putItem($params);
    echo "Added item: $title with Rating: $rating\n";
} catch (DynamoDbException $e) {
    echo "Unable to add item:\n";
    echo $e->getMessage() . "\n";
}
?>