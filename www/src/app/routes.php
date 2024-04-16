<?php
namespace App\controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// require __DIR__ . '/../controllers/Cliente.php';

#Rutas del recurso cliente
$app->post('/cliente',Cliente::class . ':create');
$app->get('/cliente/{id}',Cliente::class . ':read');
$app->put('/cliente/{id}',Cliente::class . ':update');
$app->delete('/cliente/{id}',Cliente::class . ':delete');

//Patch solo se cambia un campo, ejemplo cambiar una contrasenia
//en cambio put cambia todo un registro

$app->get('/',function(Request $request, Response $response, $args){
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/nombre',function(Request $request, Response $response, $args){
    $response->getBody()->write("Hola desde nombre!");
    return $response;
});

$app->get('/nombre/{nombre}',function(Request $request, Response $response, $args){
    $nombre = $args['nombre'];
    $response->getBody()->write("Hola $nombre!");
    return $response;
});