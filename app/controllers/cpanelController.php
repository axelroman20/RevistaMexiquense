<?php

class cPanelController{
    function __construct() {
        
    }
//--------------------------------------------------------------------------------------------------
    function index() {
        if( !isset($_SESSION['user']) || 
            !isset($_SESSION['rol'])  ||
            !isset($_SESSION['id'])) {
            Redirect::to('home');
        }
        if(($_SESSION['rol'] == 0) || ($_SESSION['rol'] == 1)) {
            Redirect::to('home');
        }
        $toasts = "";
        $links = getAllUser();
        $toasts .= addUserAdmin();
        $toasts .= editUserAdmin(); 
        if(!empty($toasts)) {
            Redirect::to('cpanel');
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

        $data = [
            'title'           => 'Panel de Control',
            'links'           => $links,
            'toast'           => $toasts
        ];
        search();
        View::render('cpanel', $data);
    }

    function delete() {
        if( !isset($_SESSION['user']) || 
            !isset($_SESSION['rol'])  ||
            !isset($_SESSION['id'])) {
            Redirect::to('home');
        }
        if(($_SESSION['rol'] == 0) || ($_SESSION['rol'] == 1)) {
            Redirect::to('home');
        }
        $links = getAllUserId($_GET['user']);
        $delete = deleteData($links);
        Redirect::to('cpanel?delete='.$delete);
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