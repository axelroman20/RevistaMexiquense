<?php

class errorController extends Controller {
    function __construct() {
        
    }

    function index() {
        login();
        register();
        
        $data = [
            'title' => 'Pagina no encontrada'
        ];
        View::render('404', $data);
    }

    function back() {
        Redirect::to('home');
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