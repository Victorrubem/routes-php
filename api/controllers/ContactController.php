<?php
namespace iphome\api\controllers;



class ContactController
{
    public function index(){
        echo json_encode(
            array("mensagem" =>  "Index do Home Contact Controller")
        );
    }

    public function store(){
        echo json_encode(
            array("mensagem" =>  "Store do Home Contact Controller")
        );
    }

}
