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
}