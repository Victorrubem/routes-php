<?php 
header('Content-Type: application/json; charset=utf-8');
require '../vendor/autoload.php';
require '../routers/router.php';

try {
    $uri = parse_url($_SERVER["REQUEST_URI"])['path'];
    $request_type = $_SERVER["REQUEST_METHOD"];

    if(!isset($routers[$request_type])){
        throw new Exception("Tipo de Request {$request_type} não está disponível");
    }

    if(!array_key_exists($uri, $routers[$request_type])){
        throw new Exception("A rota {$uri} não existe");
    }

    $controller = $routers[$request_type][$uri];

    $controller();

    // var_dump($request);
}catch(Exception $e){
    not_found($e->getMessage());
}

 