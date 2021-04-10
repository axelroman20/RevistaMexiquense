<?php 

class homeController  {
    function __construct() {
        
    }
    
    function index() {
        $errorLogin = login();
        $errorRegister = register();
        $data = [
            'title' => 'Bienvenido', 
            'errorLogin' => $errorLogin,
            'errorRegister' => $errorRegister
        ];
        View::render('main', $data);
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