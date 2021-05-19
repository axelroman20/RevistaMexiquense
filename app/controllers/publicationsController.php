<?php

class publicationsController {

    function __construct() {
        
    }

    function index() {
        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }
        
        $posts = getPost(POST_PAGE);
        $numPages = pagination(POST_PAGE);

        $data = [
            'title'         => 'Publicaciones', 
            'errorLogin'    => $errorLogin,
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
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }
        $toasts = "";
        $existslike = "";
        $likes;
        $article = getPostId($_GET['article']);
        $view = views($_GET['article'], $article[0]['views'], getRealIP());
        $active = statusAccount();
        $comments = getComments($_GET['article']);
        $commentsStatus = setComments($_GET['article']);
        
        if(isset($_SESSION['user'])) {
            $existslike = existslike($_GET['article']);
            if($existslike) {
                $likes = subLike($_GET['article'], $article[0]['likes']);
                if($likes) {
                    Redirect::to('publications/single?article='.$_GET['article']); 
                }
            } else {
                $likes = addlike($_GET['article'], $article[0]['likes']);
                if($likes) {
                    Redirect::to('publications/single?article='.$_GET['article']); 
                }
            }
        }
        
        if($commentsStatus == "enviado") {
            Redirect::to('publications/single?article='.$_GET['article']);
            $toasts .= "<script>
                            toastr.success('Recarga la pagina para ver los nuevos comentarios.', 'Comentario Enviado!');
                        </script>";
        }
        if($commentsStatus == "error") {
            $toasts .= "<script>
                            toastr.error('', 'Error del Comentario!');
                        </script>";
        }
        $data = [
            'title'         => 'Articulo', 
            'errorLogin'    => $errorLogin,
            'toast'         => $toasts,
            'article'       => $article,
            'comments'      => $comments,
            'active'        => $active,
            'existslike'    => $existslike,
            'view' => $view
        ];
        search();
        View::render('single', $data);
    }

    function delete() {
        if(empty($_GET['article'])) {
            Redirect::to('error');
        }
        if(isset($_GET['delete']) && !empty($_GET['delete'])) {
            $commentsStatus = deleteComment($_GET['delete']);
        }
        if($commentsStatus == "eliminado") {
            Redirect::to('publications/single?article='.$_GET['article']);
        }
    }

    function search() {
        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();
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
    function cpanel() {
        Redirect::to('cpanel');
    }
    function account() {
        Redirect::to('account');
    }
    function policiesprivacy(){
        Redirect::to('policiesprivacy');
    }
    function close() {
        close();
    }
    function back() {
        Redirect::to('publications');
    }

}