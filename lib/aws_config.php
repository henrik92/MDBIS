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
        'key' => 'AKIAIG67QM6MABQ2DFEQ', 
        'secret' => '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'
    ]
        ]);
    
$dynamodb = $sdk->createDynamoDb();  
$marshaler = new Marshaler();

?>