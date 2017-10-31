<?php
/*Scan Database*/
require 'vendor/autoload.php';
require 'lib/aws_config.php';

$tableName = 'Movies';


// Each item will contain the attributes we added
foreach ($iterator as $item) {
    // Grab the error string value
    echo $item['movie']['S'] . "\n";
}
?>