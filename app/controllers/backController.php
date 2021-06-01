<?php
/**
 * Clase Controlador que se encarga de redirigir
 * a los usuarios sea donde esten a la página de inicio.
 */
class backController{
    function index() {
        Redirect::to('home');
    }
}