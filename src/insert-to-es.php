<?php

require 'functions.php';

/*
insert('elastic_search', [
    'fullname'  => $faker->name,
    'address'   => $faker->address,
    'email'     => $faker->companyEmail,
    'descp'     => $faker->text,
]);
*/


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