<?php

require 'functions.php';

dump('Warning ! See codes before continue !');die; 

$indexParams['index']  = 'faker_data'; 
// $client->indices()->create($indexParams);

foreach(selectAll() as $data):
    $response = $client->index(
        [
            'index' => 'faker_data',
            'type'  => 'faker_type_1',
            'body'  => [
                'name' => $data->fullname,
                'address' => $data->address,
                'email' => $data->email,
                'description' => $data->descp,
            ],
        ]
    );
    dump($response);
endforeach;

?>