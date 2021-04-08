<?php

    function login() {
        $errorLogin = "";
        if(isset($_POST['submitLogin'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if(empty($user)) {
                $errorLogin .= "
                    <script>
                        $('.labeluser_login').addClass('errorLabel');
                        $('.inputuser_login').addClass('errorInput');
                    </script>";
            } 
            if(empty($pass)) {
                $errorLogin .= "
                    <script>
                        $('.labelpass_login').addClass('errorLabel');
                        $('.inputpass_login').addClass('errorInput');
                    </script>";
            }
            if(empty($errorLogin)) {
                try {
                    $users = new usersModel();
                    $users->user = $user;
                    $users->pass = $pass;
                    $users->loginValidate();
                    if(sha1($pass) == $users->data[0]['pass']) {
                        if($users->data) {
                            $_SESSION['user'] = $users->user;
                            $_SESSION['id']   = $users->data[0]['id'];
                        }
                    } else {
                        $errorLogin .= 'Usuario o Contraseña Incorrecta <br>';
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
        return $errorLogin;
    }


    function register() {
        $errorRegister = "";    
        if(isset($_POST['submitRegister'])) {
            $id       = ''.dechex(rand(0x000000, 0xFFFFFF));
            $rol      = 0;
            $name     = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email    = $_POST['email'];
            $user     = $_POST['user'];
            $pass     = $_POST['pass'];
            $carrer   = $_POST['carrer'];

            if(empty($name)) {
                $errorRegister .= "
                    <script>
                        $('.labelname_register').addClass('errorLabel');
                        $('.inputname_register').addClass('errorInput');
                    </script>";
            } 
            if(empty($lastname)) {
                $errorRegister .= "
                    <script>
                        $('.labellastname_register').addClass('errorLabel');
                        $('.inputlastname_register').addClass('errorInput');
                    </script>";
            } 
            if(empty($email)) {
                $errorRegister .= "
                    <script>
                        $('.labelemail_register').addClass('errorLabel');
                        $('.inputemail_register').addClass('errorInput');
                    </script>";
            } 
            if(empty($user)) {
                $errorRegister .= "
                    <script>
                        $('.labeluser_register').addClass('errorLabel');
                        $('.inputuser_register').addClass('errorInput');
                    </script>";
            } 
            if(empty($pass)) {
                $errorRegister .= "
                    <script>
                        $('.labelpass_register').addClass('errorLabel');
                        $('.inputpass_register').addClass('errorInput');
                    </script>";
            }
            if($carrer == 'Selecciona Carrera') {
                $errorRegister .= "
                    <script>
                        $('.labelcarrer_register').addClass('errorLabel');
                        $('.inputcarrer_register').addClass('errorInput');
                    </script>";
            } 
            if(empty($errorRegister)) {
                try {
                    $users = new usersModel();
                    $users->id       = $id;
                    $users->rol      = $rol;
                    $users->name     = $name;
                    $users->lastname = $lastname;
                    $users->user     = $user;
                    $passSha1        = sha1($pass);
                    $users->pass     = $passSha1;
                    $users->email    = $email;
                    $users->carrer   = $carrer;
                    $users->searchEmail();
                    if($users->data) {
                        $errorRegister .= 'Correo Elctronico ya en uso! <br>';
                    } else {
                        $users->add();
                        $_SESSION['user'] = $users->user;
                        $_SESSION['id'] = $users->id;
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
        return $errorRegister;
    }


    function loadSetting() {
        try {
            $users = new usersModel();
            $users->id = $_SESSION['id'];
            $users->settings();
            print_r($users->data);
        } catch (Exception $e) {
            echo $e->getMessage();
        } 

        return $users;
    }