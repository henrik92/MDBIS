<?php
    require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
    use Elasticsearch\ClientBuilder;
    
class elastic {
        
    public function __construct($hosts) {
        $clientBuilder = ClientBuilder::create();   // Instantiate a new ClientBuilder
        $clientBuilder->setHosts($hosts);           // Set the hosts
        $client = $clientBuilder->build(); 
    }
    
    
    
}