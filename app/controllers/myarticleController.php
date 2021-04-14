<?php

class myarticleController {
    function __construct() {

    }
//--------------------------------------------------------------------------------------------------
    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        $toasts = "";
        $users  = loadSetting();
        $active = statusAccount();
        $posts  = getPostUser($_SESSION['user']);
        $numPages = pagination(POST_PAGE);
        $data = [
            'title'           => 'Mi Cuenta',
            'id'              => $users->data[0]['id'],
            'rol'             => $users->data[0]['rol'],
            'name'            => $users->data[0]['name'],
            'lastname'        => $users->data[0]['lastname'],
            'user'            => $users->data[0]['user'],
            'pass'            => $users->data[0]['pass'],
            'pass_noencrypt'  => $users->data[0]['pass_noencrypt'],
            'email'           => $users->data[0]['email'],
            'carrer'          => $users->data[0]['carrer'],
            'token'           => $users->data[0]['token'],
            'posts'           => $posts,
            'numPage'         => $numPages,
            'active'          => $active,
            'toast'           => $toasts
        ];
        search();
        View::render('myarticle', $data);
    }
//--------------------------------------------------------------------------------------------------
    function new() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        $toasts = "";
        $toasts .= addArticle();
        $data = [
            'title'           => 'Editar Articulo',
            'toast'           => $toasts
        ];
        search();
        View::render('new', $data);
    }

    function edit() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        if(!isset($_GET['article'])){
            Redirect::to('home');
        }
        $toasts = "";
        $article = loadArticle($_GET['article']);
        $toasts .= editArticle($article);
        
        $data = [
            'title'        => 'Editar Articulo',
            'user'         => $article->data[0]['user'],
            'titlee'       => $article->data[0]['title'],
            'description'  => $article->data[0]['description'],
            'thumb'        => $article->data[0]['thumb'],
            'file'         => $article->data[0]['file'],
            'toast'        => $toasts
        ];
        search();
        View::render('edit', $data);
    }

    function delete() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');
        }
        if(!isset($_GET['article'])){
            Redirect::to('home');
        }
        $article = loadArticle($_GET['article']);
        deleteArticle($article);
        Redirect::to('myarticle');
    }

    
//--------------------------------------------------------------------------------------------------
    function resend() {
        resendEmail($_GET['email'], $_GET['name'], $_GET['lastname'], $_GET['user'], $_GET['token']);
        Redirect::to('myarticle');
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
        Redirect::to('myarticle');
    }
}