<?php

class myarticleController {
    function __construct() {

    }
//--------------------------------------------------------------------------------------------------
    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        $toasts = "";
        $users = loadSetting();

        $active = statusAccount();
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
            'carrer'          => $users->data[0]['carrer'],
            'token'           => $users->data[0]['token'],
            'active'          => $active,
            'toast'           => $toasts
        ];
        View::render('myarticle', $data);
    }
//--------------------------------------------------------------------------------------------------
    function resend() {
        resendEmail($_GET['email'], $_GET['name'], $_GET['lastname'], $_GET['user'], $_GET['token']);
        Redirect::to('myarticle');
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