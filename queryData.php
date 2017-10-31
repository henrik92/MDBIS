<?php

require 'vendor/autoload.php';
require 'lib/aws_config.php';

$tableName = 'Movies';

$eav = $marshaler->marshalJson('
    {
      ":t": "Iron"
    }
');

$params = [
    'TableName' => $tableName,
    'KeyConditionExpression' =>
    'title',
    'FilterExpression' => 'contains(title, :t)',
    'ExpressionAttributeValues' => $eav
];

echo "Querying for movies from 1992 - titles A-L, with genres and lead actor\n";

try {
    $result = $dynamodb->query($params);

    echo "Query succeeded.\n";

    foreach ($result['Items'] as $i) {
        $movie = $marshaler->unmarshalItem($i);
        print $movie['title'];

        foreach ($movie['info']['genres'] as $gen) {
            print $gen . ' ';
        }

        echo ' ... ' . $movie['info']['actors'][0] . "\n";
    }
} catch (DynamoDbException $e) {
    echo "Unable to query:\n";
    echo $e->getMessage() . "\n";
}
?>