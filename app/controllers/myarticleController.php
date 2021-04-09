<?php

class myarticleController {
    function __construct() {

    }

    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }

        $data = ['title' => 'Panel de Control'];
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