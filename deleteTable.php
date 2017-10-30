Copy
<?php
require 'vendor/autoload.php';

date_default_timezone_set('Europe/Berlin');

use Aws\DynamoDb\Exception\DynamoDbException;

$sdk = new Aws\Sdk([
    'endpoint' => 'http://localhost:8002',
    'region' => 'eu-central-1',
    'version' => 'latest'
        ]);

$dynamodb = $sdk->createDynamoDb();

$params = [
    'TableName' => 'Movies'
];

try {
    $result = $dynamodb->deleteTable($params);
    echo "Deleted table.\n";
} catch (DynamoDbException $e) {
    echo "Unable to delete table:\n";
    echo $e->getMessage() . "\n";
}
?>