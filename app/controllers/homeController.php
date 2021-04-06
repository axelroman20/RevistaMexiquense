<?php 

class homeController extends Controller {
    function __construct() {
        
    }
    
    function index() {
        login();
        register();

        $data = ['title' => 'Bienvenido'];
        View::render('main', $data);
    }

    function publications() {
        login();
        register();

        $data = [
            'title' => 'Publicaciones'
        ];
        View::render('publications', $data);
    }

}