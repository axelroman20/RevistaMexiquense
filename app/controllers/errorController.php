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
}