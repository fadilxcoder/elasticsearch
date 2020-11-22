<?php

require 'functions.php';

$query = $client->search([
    'size' => 100,
    'index' => 'faker_data',
    'body' => [
        'query' => [
            'match' => [
                'name' => 'murazik'
            ]
        ]
    ]
]);

dump($query['hits']);

if ($query['hits']['total'] >= 1) { 
    $results = $query['hits']['hits'];
    dump($results);
}

?>