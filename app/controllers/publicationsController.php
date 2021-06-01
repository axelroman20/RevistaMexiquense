<?php
/**
 * Clase Contructor de la página de publicaciones controla
 * todo lo referente a esta y sus subpáginas
 */
class publicationsController {
    // Funcion que se ejecuta al iniciar la página
    /**
     * Se visualiza todos los articulos creados de los usuarios
     *  dentro del proyecto.
     */
    function index() {
        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();        // Se encarga del inicio de sesión
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }
        $posts = getPost(POST_PAGE);         // Carga todos los articulos 
        $numPages = pagination(POST_PAGE);   // Crea la paginacion confirme los articulos
        $data = [                            // Captura los datos para usarlos dentro de la página
            'title'         => 'Publicaciones', 
            'errorLogin'    => $errorLogin,
            'posts'         => $posts,
            'numPage'       => $numPages
        ];
        search();                            // Motor de busqueda de articulo del proyecto
        View::render('publications', $data); // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Funcion de la subpágina single
    /**
     * Se visualiza un articulo en especifico junto a sus datos (cantidad de likes,
     * cantidad de vistas, comentarios , etc).
     */
    function single() {
        if(empty($_GET['article'])) {
            Redirect::to('error');                                                  // Redirige a página de error si no hay articulo existente
        }
        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();                                               // Se encarga del inicio de sesión
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }
        $toasts = "";
        $existslike = "";
        $likes;
        $article = getPostId($_GET['article']);                                     // Carga los datos del articulo mediante la id enviada
        $view = views($_GET['article'],                                             // Carga la cantidad de visualizaciones del articulo
            $article[0]['views'], getRealIP());                                     // Obtiene la dirección ip del usuario
        $active = statusAccount();                                                  // Valida el estado del usuario y ver si puede comentar o no
        $comments = getComments($_GET['article']);                                  // Carga los comentatios del articulo
        $commentsStatus = setComments($_GET['article']);                            // Registra los comentarios que hacen los usuario
        /**
         * Verifica si el usuario ya le dio like al articulo,
         * en caso de que no exista el like entonces se le da like y
         * se registra la acción o si existe el like entonces se lo elimina.
         */
        if(isset($_SESSION['user'])) {
            $existslike = existslike($_GET['article']);                             // Valida si existe like     
            if($existslike) {
                $likes = subLike($_GET['article'], $article[0]['likes']);           // Elimina el like
                if($likes) {
                    Redirect::to('publications/single?article='.$_GET['article']);  // Recarga la pagina
                }
            } else {
                $likes = addlike($_GET['article'], $article[0]['likes']);           // Agrega el like
                if($likes) {
                    Redirect::to('publications/single?article='.$_GET['article']);  // Recarga la pagina
                }
            }
        }
        /**
         * Varifica el estado del comentario, si se envio o fallo algo
         * en el proceso, este muestra un mensaje via javascript
         */
        if($commentsStatus == "enviado") {
            Redirect::to('publications/single?article='.$_GET['article']); // Recarga la pagina
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
        search();                                                          // Motor de busqueda del proyecto
        View::render('single', $data);                                     // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Función que elimina el comentario del articulo
    /**
     * Se encarga de eliminar el comentario seleccionado
     * por el usuario, este solo puede eliminar los que el a creado.
     */
    function delete() {
        if(empty($_GET['article'])) {
            Redirect::to('error');                                         // Redirige a la página de error
        }
        if(isset($_GET['delete']) && !empty($_GET['delete'])) {
            $commentsStatus = deleteComment($_GET['delete']);              // Elimina el comentario
        }
        if($commentsStatus == "eliminado") {
            Redirect::to('publications/single?article='.$_GET['article']); // Recarga la página
        }
    }
/* -------------------------------------------------------------------------- */
    // Función de la subpagina de Search
    /**
     * Dependiendo de los valores enviados por el metodo get 
     * hace la busqueda de los articulos y los muestra en la subpágina
     * en caos de no encontrar saca un mensaje de error.
     */ 
    function search() {
        if(!isset($_SESSION['user'])) {
            $errorLogin    = login();      // Se encarga del inicio de sesión
        } else {
            $errorLogin    = '';
            $errorRegister = '';
        }

        if(!isset($_GET['s'])) {
            Redirect::to('error');         // Redirige a la página de error
        }
        search();                          // Motor de bsuqueda del proyecto
        $posts = searchPost();             // Carga los articulos buscado por el usuario
        $numPages = pagination(POST_PAGE); // Carga la paginación dependiendo de los articulos
        $data = [
            'title'         => 'Busqueda', 
            'errorLogin'    => $errorLogin,
            'posts'         => $posts,
            'numPage'       => $numPages
        ];
        
        View::render('search', $data);     // Renderiza la página
    }

//--------------------------------------------------------------------------------------------------
    // Redirige al usuario a otra página
    function home() {
        Redirect::to('home');
    }
    // Redirige al usuario a otra página
    function publications() {
        Redirect::to('publications');
    }
    // Redirige al usuario a otra página
    function myarticle() {
        Redirect::to('myarticle');
    }
    // Redirige al usuario a otra página
    function cpanel() {
        Redirect::to('cpanel');
    }
    // Redirige al usuario a otra página
    function account() {
        Redirect::to('account');
    }
    // Redirige al usuario a otra página
    function policiesprivacy(){
        Redirect::to('policiesprivacy');
    }
    // Redirige al usuario a la funcion close
    function close() {
        close();
    }
    // Redirige a la página anterior
    function back() {
        Redirect::to('publications');
    }

}