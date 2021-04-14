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
        search();
        View::render('publications', $data);
    }

    function single() {
        if(!isset($_GET['user']) && !isset($_GET['file'])) {
            Redirect::to('error');
        }

        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();
            $errorRegister = register();
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }

        $data = [
            'title'         => 'Publicaciones', 
            'errorLogin'    => $errorLogin,
            'errorRegister' => $errorRegister
        ];
        search();
        View::render('single', $data);
    }

    function search() {
        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();
            $errorRegister = register();
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }

        if(!isset($_GET['s'])) {
            Redirect::to('error');
        }
        search();
        $posts = searchPost();
        $numPages = pagination(POST_PAGE);
        $data = [
            'title'         => 'Busqueda', 
            'errorLogin'    => $errorLogin,
            'errorRegister' => $errorRegister,
            'posts'         => $posts,
            'numPage'       => $numPages
        ];
        
        View::render('search', $data);
    }

//--------------------------------------------------------------------------------------------------
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