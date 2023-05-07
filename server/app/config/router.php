<?php

// use App\Middleware\AuthMiddleware;

$router = $di->getRouter();

// $authMiddleWare = new AuthMiddleware();
$router->add(
    '/',
    [
        'controller' => 'Index',
        'action'     => 'index',
        'middleware' => $authMiddleWare
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
