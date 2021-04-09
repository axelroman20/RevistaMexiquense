<?php

class accountController{
    function __construct() {

    }

    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }

        $users = loadSetting();

        $data = [
            'title'           => 'Mi Cuenta',
            'id'              => $users->data[0]['id'],
            'rol'             => $users->data[0]['rol'],
            'name'            => $users->data[0]['name'],
            'lastname'        => $users->data[0]['lastname'],
            'user'            => $users->data[0]['user'],
            'pass'            => $users->data[0]['pass'],
            'pass_noencrypt'  => $users->data[0]['pass_noencrypt'],
            'email'           => $users->data[0]['email'],
            'carrer'          => $users->data[0]['carrer']
        ];
        View::render('account', $data);
    }
    
}