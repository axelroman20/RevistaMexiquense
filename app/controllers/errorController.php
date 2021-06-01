<?php
/**
 * Clase Controaldor que muestra un mensaje de error
 * cuando la página o el metodo no se encuentra, mostrando
 * el error 404 Not Found.
 */
class errorController {
    // Función que se ejecuta al iniciar la página
    function index() {
        $errorLogin = login();      // Se encarga del inicio de sesión
        search();                   // Motor de busqueda de articulo del proyecto
        $data = [                   // Captura los datos para usarlos dentro de la página
            'title' => 'Pagina no encontrada',
            'errorLogin' => $errorLogin
        ];
        View::render('404', $data); // Renderiza la página
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
    // Redirige al usuario a la funcion close
    function close() {
        close();
    }
    // Redirige al usuario al inicio
    function back() {
        Redirect::to('home');
    }
}