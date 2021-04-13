<?php

class publicationsController {

    function __construct() {
        
    }

    function index() {

        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();
            $errorRegister = register();
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }
        
        $posts = getPost(POST_PAGE);
        $numPages = pagination(POST_PAGE);

        $data = [
            'title'         => 'Publicaciones', 
            'errorLogin'    => $errorLogin,
            'errorRegister' => $errorRegister,
            'posts'         => $posts,
            'numPage'       => $numPages
        ];

        View::render('publications', $data);
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
        Redirect::to('publications');
    }

}