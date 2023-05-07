<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    '/',
    [
        'controller' => 'Index',
        'action'     => 'index',
    ]
)->via(['GET']);

//get all
$router->addGet('/patient', [
    'controller'=>'patient',
    'action'=> 'index'
]);
// get one patient
$router->addGet('/patient/{id}', [
    'controller' => 'patient',
    'action' => 'findOne'
])->setName('findOnePatient');

//create new patient
$router->addPost('/patient', [
    'controller'=>'patient',
    'action'=> 'create'
]);
//update patient
$router->addPut('/patient/{id}', [
    'controller'=>'patient',
    'action'=> 'update'
]);
// delete patient
$router->addDelete('/patient/{id}', [
    'controller'=>'patient',
    'action'=> 'delete'
]);


$router->handle($_SERVER['REQUEST_URI']);
