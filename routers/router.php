<?php 
function load(string $controller, string $action){
    
    try {
        $controllerNamespace = "iphome\\api\\controllers\\{$controller}";
        if(!class_exists($controllerNamespace)){
            throw new Exception("O controller {$controller} não existe!");
        }
    
         $controllerInstance = new $controllerNamespace();
    
        if(!method_exists($controllerInstance, $action)){
            throw new Exception("O método {$action} não existe no controller {$controller} !");
        }
    
         $controllerInstance->$action();

    } catch(Exception $e){
        not_found($e->getMessage());
    }

    
}

$routers = [
    'GET'=> [
        '/' =>fn()=>  load('HomeController', 'index'),
        '/contact' =>fn()=>  load('ContactController', 'index')
    ],
    'POST'=> [
        '/contact' =>fn()=>  load('ContactController', 'store')
    ]  
];

function not_found(string $message){
    http_response_code(404);
    echo json_encode(
        array("mensagem" =>  $message)
    );
}