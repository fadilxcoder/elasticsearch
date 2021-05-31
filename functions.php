<?php

require 'db.php';
require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder as ClientBuilder;
use Elasticsearch\Common\Exceptions\{BadRequest400Exception, Missing404Exception};
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
global $client;            

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

function createIndexWithAlias($idxName1, $idxName2, $alias)
{
    global $client;

    # Create Index
    try 
    {
        $client->indices()->create([
            'index' =>  $idxName1,
        ]);

        try {
            deleteIndex($idxName2);
        } catch (Missing404Exception $e) {
            echo "Unable to delete : " . $idxName2 . "\n";
        }

        $idxName = $idxName1;
    } 
    catch (BadRequest400Exception $e) 
    {
        $client->indices()->create([
            'index' =>  $idxName2,
        ]);

        try {
            deleteIndex($idxName1);
        } catch (Missing404Exception $e) {
            echo "Unable to delete : " . $idxName1 . "\n";
        }

        $idxName = $idxName2;
    }
    
    # Add aliase to Index
    $params = [
        'body' => [
            'actions'  => [
                'add' => [
                    'index' => $idxName,
                    'alias' => $alias,
                ]
            ]
        ]
    ];
    $client->indices()->updateAliases($params);
}

function deleteIndex($idxName)
{
    global $client;

    $indexParams = [
        'index' =>  $idxName,
    ];

    $client->indices()->delete($indexParams);
}