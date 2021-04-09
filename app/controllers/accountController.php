<?php

class accountController{
    function __construct() {

    }
//--------------------------------------------------------------------------------------------------
    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        $users = loadSetting();
        updateName($users->data[0]['id']);
        updatePass($users->data[0]['id']);
        updateEmail($users->data[0]['id']);
        updateCarrer($users->data[0]['id']);
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
//--------------------------------------------------------------------------------------------------
    function recover_password() {
        $errorLogin = login();
        $errorRegister = register();
        $data = [
            'title'         => 'Recuperar Contraseña', 
            'errorLogin'    => $errorLogin,
            'errorRegister' => $errorRegister
        ];
        if(isset($_SESSION['user'])) {
            $users = loadSetting();
            $data = [
                'title'           => 'Recuperar Contraseña',
                'errorLogin'      => $errorLogin,
                'errorRegister'   => $errorRegister,
                'email'           => $users->data[0]['email'],
            ];
        }
        recoverPassword(isset($users->data[0]['id']) ? $users->data[0]['id'] : 'void');
        View::render('recoverPassword', $data);
    }
//--------------------------------------------------------------------------------------------------
    function restore_password() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        $users = loadSetting();
        $data = ['title' => 'Restablecer Contraseña'];
        restorePassword($users->data[0]['id']);
        View::render('restorePassword', $data);
    }
//--------------------------------------------------------------------------------------------------
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