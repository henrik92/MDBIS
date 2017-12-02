<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './vendor/autoload.php';

date_default_timezone_set('Europe/Berlin');

use Aws\DynamoDb\Exception\DynamoDbException;

$sdk = new Aws\Sdk([
    'endpoint' => 'http://localhost:8002',
    'region' => 'eu-central-1',
    'version' => 'latest'
        ]);

$dynamodb = $sdk->createDynamoDb();

$params = [
    'TableName' => 'Rating',
    'KeySchema' => [
        [
            'AttributeName' => 'title',
            'KeyType' => 'HASH'  //Partition key
        ]
    ],
    'AttributeDefinitions' => [
        [
            'AttributeName' => 'title',
            'AttributeType' => 'S'
        ],
    ],
    'ProvisionedThroughput' => [
        'ReadCapacityUnits' => 10,
        'WriteCapacityUnits' => 10
    ]
];

try {
    $result = $dynamodb->createTable($params);
    echo 'Created table.  Status: ' .
    $result['TableDescription']['TableStatus'] . "\n";
} catch (DynamoDbException $e) {
    echo "Unable to create table:\n";
    echo $e->getMessage() . "\n";
}
?>