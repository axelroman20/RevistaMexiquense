<?php

class publicationsController {
    function __construct() {
        
    }

    function index() {
        $errorLogin = login();
        $errorRegister = register();
        
        $data = [
            'title' => 'Publicaciones', 
            'errorLogin' => $errorLogin,
            'errorRegister' => $errorRegister
        ];
        View::render('publications', $data);
    }

}