<?php
namespace iphome\api\controllers;



class HomeController
{
    public function index(){
        echo json_encode(
            array("mensagem" =>  "Index do Home Controller")
        );
    }
}
