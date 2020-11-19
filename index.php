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
        // 'query' => [ 
            // 'bool' => [
                // 'filter' => [
                    // 'term' => [ 'description' => 'doloremque' ]
                    // 'term' => [ 'name' => 'ahmad' ]
                // ],
                // 'should' => [
                //     'match' => [ 'my_other_field' => 'xyz' ]
                // ]
            // ]
        // ]
    ]
]);

// dump($query);

if ($query['hits']['total'] >= 1) { 
    $results = $query['hits']['hits'];
    dump($results);
}

?>