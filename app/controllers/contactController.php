<?php

class contactController{
    function __construct() {
        
    }
//--------------------------------------------------------------------------------------------------
    function index() {
        $toasts = "";
        $toasts .= waitMe();
        $toasts .= sendEmailContact();
        $data = [
            'title'           => 'Contacto',
            'toast'           => $toasts
        ];
        View::render('contact', $data);
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