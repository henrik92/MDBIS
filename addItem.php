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

$title = 'The Big New Movie';

$item = $marshaler->marshalJson('
    {
        "title": "' . $title . '",        
        "year": "2008",
        "info": {
            "plot": "Nothing happens at all.",
            "rating": 0
        }
    }
');

$params = [
    'TableName' => 'Movies',
    'Item' => $item
];


try {
    $result = $dynamodb->putItem($params);
    echo "Added item: $title\n";
} catch (DynamoDbException $e) {
    echo "Unable to add item:\n";
    echo $e->getMessage() . "\n";
}
?>