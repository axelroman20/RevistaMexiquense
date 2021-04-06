<?php

class publicationsController {
    function __construct() {
        
    }

    function index() {
        login();
        register();
        
        $data = ['title' => 'Publicaciones'];
        View::render('publications', $data);
    }

}