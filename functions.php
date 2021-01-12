<?php

require 'db.php';
require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder as ClientBuilder;
use Tracy\Debugger as Debugger;
use Faker\Factory as Factory;

Debugger::enable(Debugger::DEVELOPMENT);
$faker = Factory::create();

$hosts = [
    [
        'host' => 'fx-development-5010443661.us-east-1.bonsaisearch.net',
        'port' => '80',
        'scheme' => 'http',
        'user' => 'akapqcwant',
        'pass' => 'hg44v0h9r5'
    ],
    // 'http://akapqcwant:hg44v0h9r5@fx-development-5010443661.us-east-1.bonsaisearch.net:80',  
];

$client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();

# Show Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# Database Manipulation
function converter($query)
{
    $arr = array();
    while( $data = $query->fetch_object()):
        $arr[] = $data;
    endwhile;
    
    return $arr;
}

function selectAll()
{
    global $connection;
    $sql    = "SELECT * FROM elastic_search";
    $query  = $connection->query($sql);
    $result = converter($query);
    
    return $result;
}