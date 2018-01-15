<?php 
require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
require $_SERVER["DOCUMENT_ROOT"] . '/cfg/es_config.php';
use Elasticsearch\ClientBuilder;

class elastic {
    
        function __construct($hosts) {
        $clientBuilder = ClientBuilder::create();   // Instantiate a new ClientBuilder
        $clientBuilder->setHosts($hosts);           // Set the hosts
        $es_client = $clientBuilder->build(); 
    }
    
function getSuggestions ($params){
    $result = $es_client->search($params);
    return $result; 
}
    
}