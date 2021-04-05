<?php 

class homeController extends Controller {
    function __construct() {
        
    }
    
    function index() {
        
        login();
        register();
            


        $data = [
            'title' => 'Bienvenido',
            'bg' => 'dark'
        ];
        View::render('main', $data);
    }
}