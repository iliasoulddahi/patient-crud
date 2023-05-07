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

//create new patient
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

$router->handle($_SERVER['REQUEST_URI']);
