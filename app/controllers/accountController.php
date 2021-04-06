<?php

class accountController{
    function __construct() {

    }

    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        
        $data = ['title' => 'Mi Cuenta'];
        View::render('account', $data);
    }
    
}