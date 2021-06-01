<?php 
/**
 * El archivo index.php es el que se encarga de llamar al
 * archivo main.php el cual va cargando todos los archivos necesarios
 * para el funcionamiento del framework con el patron (modelo-vista-
 * controlador) MVC en el que esta basado el proyecto.
 */
// Requerir el archivo de la clase Main.php
require_once 'app/classes/main.php';

// Ejecutar el framework mvc
Main::start();