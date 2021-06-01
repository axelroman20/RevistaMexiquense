<?php 
/**
 * Clase Controlador de la página de inicio que se encarga de la
 * todo lo referente a esta.
 */
class homeController {
    // Función que se ejecuta al iniciar la página
    function index() {
        $errorLogin    = login();         // Se encarga del inicio de sesión
        $postsLikes    = getPostLikes(3); // Cargar los articulos por la cantidad de likes
        $postsViews    = getPostViews(8); // Carga los articulos por cantidad de vistas
        $data = [                         // Captura los datos para usarlos dentro de la página
            'title'         => 'Bienvenido', 
            'errorLogin'    => $errorLogin,
            'postsLikes'    => $postsLikes,
            'postsViews'    => $postsViews
        ];
        search();                         // Motor de busqueda de articulo del proyecto
        View::render('main', $data);      // Renderiza la página
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
    
}