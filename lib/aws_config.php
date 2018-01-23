<?php
/*
    DYNAMODB CONNECTION
 *  */
require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';

date_default_timezone_set('Europe/Berlin');

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

    $sdk = new Aws\Sdk([
    'region' => 'eu-central-1',
    'version' => 'latest',
    'scheme' => 'http', 
    'credentials' => [
        'key' => '*****************', 
        'secret' => '*****************'
    ]
        ]);
    
$dynamodb = $sdk->createDynamoDb();  
$marshaler = new Marshaler();

?>
