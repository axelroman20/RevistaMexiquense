<?php

class cPanelController{
    function __construct() {
        
    }
//--------------------------------------------------------------------------------------------------
    function index() {
        if( !isset($_SESSION['user']) || 
            !isset($_SESSION['rol'])  ||
            !isset($_SESSION['id'])) {
            Redirect::to('home');
        }
        if($_SESSION['rol'] != 3) {
            Redirect::to('home');
        }
        $toasts = "";
        $users  = loadSetting();
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
            'toast'           => $toasts
        ];
        search();
        View::render('cpanel', $data);
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
    function back() {
        Redirect::to('myarticle');
    }
}