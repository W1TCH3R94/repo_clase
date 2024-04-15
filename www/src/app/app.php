<!-- Aplicacion de prueba -->
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

#En php require es para importar un archivo o se utiliza include
require __DIR__ . '/../../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

// '/nombre' -> esto es un endpoint
$app->get('/nombre', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hola desde nombre");
    return $response;
});

// '/{nombre}' -> entre las llaves se usa para mandar un argumento
$app->get('/hola/{nombre}', function (Request $request, Response $response, $args) {
    $nombre = $args['nombre'];
    $response->getBody()->write("Hola $nombre");
    return $response;
});

//  No puedo tener 2 get con el mismo endpoint, pero si un get y un post con el mismo nombre
$app->post('/nombre', function (Request $request, Response $response, $args) {
    //Con el 1 trae un objeto con un arreglo dentro
    $body = json_decode($request->getBody(),1);
    
    // var_dump(($body));
    // die();

    $body["nombre"] = "Pepe Trueno"; 
    $body["apellido1"] = "Longaniza"; 
    $body["apellido2"] = "Casemiro"; 
    $body = json_encode($body);
    $response->getBody()->write($body);
    $status = 404; //Not found
    // $status = 200; //Not found
    return $response->withHeader('Content-type','Application/json')->withStatus($status);
    // return $response;
});

$app->run();