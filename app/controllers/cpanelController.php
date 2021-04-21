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
        if($_SESSION['rol']==2){ $links = getLinkUser(); }
        if($_SESSION['rol']==3){ 
            $links = getAllUser(); 
            $toasts .= addUserAdmin();
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
        deleteData($links);
        Redirect::to('cpanel');
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