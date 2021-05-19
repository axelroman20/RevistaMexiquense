<?php

class policiesprivacyController{
    function __construct() {
        
    }
//--------------------------------------------------------------------------------------------------
    function index() {
        $errorLogin    = login();
        $toasts = "";
        $data = [
            'title'           => 'Politicas y Privacidad',
            'errorLogin'      => $errorLogin,
            'toast'           => $toasts
        ];
        View::render('policiesprivacy', $data);
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