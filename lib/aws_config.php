<?php
require 'vendor/autoload.php';

date_default_timezone_set('Europe/Berlin');

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

    $sdk = new Aws\Sdk([
    'region' => 'eu-central-1',
    'version' => 'latest',
    'scheme' => 'http'
        ]);
    
$dynamodb = $sdk->createDynamoDb();  
$marshaler = new Marshaler();