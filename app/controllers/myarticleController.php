<?php

class myarticleController {
    function __construct() {

    }

    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        $toasts = "";
        $active = statusAccount();
        $data = [
            'title' => 'Panel de Control',
            'active'          => $active
        ];
        View::render('myarticle', $data);
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