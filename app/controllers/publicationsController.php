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
        if(empty($_GET['article'])) {
            Redirect::to('error');
        }

        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();
            $errorRegister = register();
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }
        
        $article = getPostId($_GET['article']);
        views($_GET['article'], $article[0]['views']);
        $data = [
            'title'         => 'Articulo', 
            'errorLogin'    => $errorLogin,
            'errorRegister' => $errorRegister,
            'article'       => $article
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