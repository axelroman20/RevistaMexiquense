<?php

    function close() {
        session_start();
        session_destroy();
    }

    function login() {
        $errorLogin = "";
        
        if(isset($_POST['submitLogin'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if(empty($user)) {
                $errorLogin .= 'Porfavor agregar un Usuario <br>';
            } 

            if(empty($pass)) {
                $errorLogin .= 'Porfavor agregar una Contraseña <br>';
            }
            
            if(empty($errorLogin)) {
                try {
                    $users = new usersModel();
                    $users->user = $_POST['user'];
                    $users->pass = $_POST['pass'];
                    $users->search();
                    if($users->data) {
                        $_SESSION['user'] = $users->user;
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
        define('ERROR_LOGIN', $errorLogin); 
    }

    function register() {

    }