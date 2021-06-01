<?php
/**
 * Clase Constructor de la página de politica de privacidad
 * que se encarga de la todo lo referente a esta.
 */
class policiesprivacyController{
    // Función que se ejecuta al iniciar la página
    function index() {
        $errorLogin = login();                  // Se encarga del inicio de sesión
        $toasts = "";
        $data = [                               // Captura los datos para usarlos dentro de la página
            'title'           => 'Politicas y Privacidad',
            'errorLogin'      => $errorLogin,
            'toast'           => $toasts
        ];
        search();                               // Motor de busqueda de articulo del proyecto
        View::render('policiesprivacy', $data); // Renderiza la página
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