<?php 

class homeController extends Controller {
    function __construct() {
        
    }
    
    function index() {
        $errorLogin = login();
        $errorRegister = register();

        $data = [
            'title' => 'Bienvenido', 
            'errorLogin' => $errorLogin,
            'errorRegister' => $errorRegister
        ];
        View::render('main', $data);
    }
    
}