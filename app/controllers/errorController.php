<?php

class errorController extends Controller {
    function __construct() {
        
    }

    function index() {
        login();
        register();
        search();
        $data = [
            'title' => 'Pagina no encontrada'
        ];
        View::render('404', $data);
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
    function back() {
        Redirect::to('home');
    }
}