<?php

class closeController extends Controller {
    function __construct() {
        
    }

    function index() {
        session_start();
        session_destroy();
        $_SESSION = array();
        Redirect::to('home');
        die();
    }
}