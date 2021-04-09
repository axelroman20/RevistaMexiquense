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

    function home() {
        Redirect::to('home');
    }
    function publications() {
        Redirect::to('publications');
    }
    function myarticle() {
        Redirect::to('myarticle');
    }
    function account() {
        Redirect::to('account');
    }
    function close() {
        close();
    }

}