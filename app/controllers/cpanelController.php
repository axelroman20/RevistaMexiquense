<?php
/**
 * Clase Controlador de la página panel de control que se encarga de la
 * todo lo referente a esta.
 */
class cPanelController{
    // Función que se ejecuta al iniciar la página
    function index() {
        /**
         * Verifica que exista la cuenta del usuario 
         * sino lo redirigimos a la página del inicio.
         */
        if( !isset($_SESSION['user']) || 
            !isset($_SESSION['rol'])  ||
            !isset($_SESSION['id'])) {
            Redirect::to('home');      // Redirige al inicio
        }
        /**
         * Valida si tiene los permisos necesarios
         */
        if(($_SESSION['rol'] == 0) || ($_SESSION['rol'] == 1)) {
            Redirect::to('home');      // Redirige al inicio
        }
        $toasts = "";
        $links = getAllUser();         // Carga todos los usuarios registrados
        $toasts .= addUserAdmin();     // Crea nuevos usuarios 
        $toasts .= editUserAdmin();    // Modifica los datos del los usuarios
        if(!empty($toasts)) {
            Redirect::to('cpanel');    // Recarga la pagina
        }
        if(isset($_GET['delete'])){
            if($_GET['delete'] == "true") {
                $toasts .= "<script>
                                toastr.success('Se elimino el usuario y sus todos sus datos correctamente!', 'Cuenta Eliminada!');          
                            </script>";
            }
            if($_GET['delete'] == "false") {
                $toasts .= "<script>
                                toastr.error('No se pudo eliminar la cuenta', 'Error Datos de Cuenta!');   
                            </script>";
            }
        }
        $data = [                      // Captura los datos para usarlos dentro de la página
            'title'           => 'Panel de Control',
            'links'           => $links,
            'toast'           => $toasts
        ];
        search();                      // Motor de busqueda de articulo del proyecto
        View::render('cpanel', $data); // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Función que elimina a un usuario
    /**
     * Elimina a un usuario con todo lo que este creo
     * dentro del proyecto como articulos, vistas, likes, comentarios.
     */
    function delete() {
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
        if(($_SESSION['rol'] == 0) || ($_SESSION['rol'] == 1)) {
            Redirect::to('home');
        }
        $links = getAllUserId($_GET['user']);   // Carga los datos del usuario por su id
        $delete = deleteData($links);           // Elimina al usuario por su id
        Redirect::to('cpanel?delete='.$delete); // Recaga la página
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