<?php
/**
 * Clase Controlador de la página de cuenta del usuario
 * donde se maneja todo lo referente a esta y sus subpáginas.
 */
class myarticleController {
    // Función que se ejecuta al iniciar la página
    function index() {
        /**
         * Verifica que exista la cuenta del usuario 
         * sino lo redirigimos a la página del inicio.
         */
        if( !isset($_SESSION['user']) || 
            !isset($_SESSION['rol'])  ||
            !isset($_SESSION['id'])) {
            Redirect::to('home');
        }
        /**
         * Valida si tiene los permisos necesarios
         */
        if($_SESSION['rol'] != 1) {
            Redirect::to('home');
        }
        $toasts = "";
        $users  = loadSetting();                  // Carga toda la infomación de la cuenta del usuario
        $active = statusAccount();                // Valida si esta activa la cuenta del usuario
        $posts  = getPostUser($_SESSION['user']); // Carga todos lo articulos creados por usuario
        $numPages = pagination(POST_PAGE);        // Carga la paginacion dependiendo de los articulos
        $data = [                                 // Captura los datos para usarlos dentro de la página
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
        search();                                 // Motor de busqueda de articulo del proyecto
        View::render('myarticle', $data);         // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Función que crea un articulo
    /**
     * Captura los datos y archivos subidos, ademas de que 
     * hace varias validaciones para permitir la creación 
     * del nuevo articulo.
     */
    function new() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');   // Redireccion al inicio
        }
        $toasts = "";
        $toasts .= addArticle();    // Crea el nuevo articulo 
        $data = [                   // Captura los datos para usarlos dentro de la página
            'title'           => 'Editar Articulo',
            'toast'           => $toasts
        ];
        search();                   // Motor de busqueda del proyecto
        View::render('new', $data); // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Edita los datos del articulo
    /**
     * Modifica todos los datos del articulo dentro
     * de la base de datos asi como remplazando los archivos 
     * almacenados en los directorios.
     */
    function edit() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');                 // Redireccion al inicio
        }
        if(!isset($_GET['article'])){
            Redirect::to('home');                 // Redireccion al inicio
        }
        $toasts = "";
        $article = loadArticle($_GET['article']); // Carga los datos el articulo
        $toasts .= editArticle($article);         // Modifica los datos del articulo
        $data = [                                 // Captura los datos para usarlos dentro de la página
            'title'        => 'Editar Articulo',
            'id_user'         => $article->data[0]['id_user'],
            'user'         => $article->data[0]['user'],
            'titlee'       => $article->data[0]['title'],
            'description'  => $article->data[0]['description'],
            'thumb'        => $article->data[0]['thumb'],
            'file'         => $article->data[0]['file'],
            'toast'        => $toasts
        ];
        search();                                 // Motor de busqueda del proyecto
        View::render('edit', $data);              // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Elimna el articulo
    /**
     * Elimna el articulo seleccionado asi como 
     * todo los datos vinculados a el com las
     * vistas y comentarios
     */
    function delete() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');                 // Redireccion al inicio
        }
        if(!isset($_GET['article'])){
            Redirect::to('home');                 // Redireccion al inicio
        }
        $article = loadArticle($_GET['article']); // Carga los datos del articulo
        deleteArticle($article);                  // Elimina el articulo
        Redirect::to('myarticle');                // Recarga la pagina
    }
/* -------------------------------------------------------------------------- */
    // Reenvia el correo de activacion
    /**
     * Reenvia el correo de activacion en caso de que no le haya llegado al
     * usuario puede volver a pedir que lo envien.
     */ 
    function resend() {
        // Envia el correo
        resendEmail($_GET['email'], $_GET['name'], $_GET['lastname'], $_GET['user'], $_GET['token']);
        // Recarga la página
        Redirect::to('myarticle');
    }
/* -------------------------------------------------------------------------- */
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
        Redirect::to('myarticle');
    }
}