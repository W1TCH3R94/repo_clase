<?php

namespace App\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Cliente{

    function create(Request $request, Response $response, $args){
        $body = json_decode($request->getBody(),1);
        $body['id']='15';
        $response->getBody()->write(json_encode($body));
        return $response
            ->withHeader('Content-type', 'Application/json')
            ->withStatus(200);
    }

    function read(Request $request, Response $response, $args){
        $response->getBody()->write("Hola desde el read");
        return $response->withStatus(404);
    }

    function update(){
    }

    function delete(){
    }
}



