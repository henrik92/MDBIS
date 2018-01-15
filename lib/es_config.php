<?php
require 'vendor/autoload.php';


//Initializing Elastic Client
use Elasticsearch\ClientBuilder;
$single = ClientBuilder::singleHandler();
$hosts = [
  'http://search-mdbis-x25ypnphotzm5cnlfacv4nw7xq.eu-central-1.es.amazonaws.com:80'
];

$clientBuilder = ClientBuilder::create();
$clientBuilder->setHosts($hosts);
$clientBuilder->setHandler($single);
$elastic_client = $clientBuilder->build();