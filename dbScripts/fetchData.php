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

$movies = json_decode(file_get_contents('moviedata.json'), true);

foreach ($movies as $movie) {

    $title = $movie['title'];
    $year = $movie['year'];
    $info = $movie['info'];

    $json = json_encode([
        'title' => $title,
        'year' => $year,
        'info' => $info
    ]);

    $params = [
        'TableName' => $tableName,
        'Item' => $marshaler->marshalJson($json)
    ];

    try {
        $result = $dynamodb->putItem($params);
        echo "Added movie: " . $movie['year'] . " " . $movie['title'] . "\n";
    } catch (DynamoDbException $e) {
        echo "Unable to add movie:\n";
        echo $e->getMessage() . "\n";
        break;
    }
}
?>