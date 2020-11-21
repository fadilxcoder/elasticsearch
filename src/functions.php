<?php

require 'db.php';
require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder as ClientBuilder;
use Tracy\Debugger as Debugger;
use Faker\Factory as Factory;

Debugger::enable(Debugger::DEVELOPMENT);
$faker = Factory::create();

$hosts = [
    '172.18.0.1:9200',
];


// dump(gethostname());die;

$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setSSLVerification(false)
                    ->setHosts($hosts)      // Set the hosts
                    ->build();              // Build the client object

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

function insert($tbl, $data)
{
    global $connection;
    foreach( array_keys($data) as $key ) 
    {
        $cleanString = $connection->real_escape_string($data[$key]);

        $fields[] = "`$key`";
        $values[] = "'" . $cleanString . "'";
    }
    $fields = implode(",", $fields);
    $values = implode(",", $values);
    $sql = "INSERT INTO `$tbl`($fields) VALUES ($values)";
    $connection->query($sql);
    
    return true;
}