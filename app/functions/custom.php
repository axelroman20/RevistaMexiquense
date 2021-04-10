<?php
//--------------------------------------------------------------------------------------------------
    function login() {
        $errorLogin = "";
        if(isset($_POST['submitLogin'])) {
            $user = filter($_POST['user']);
            $pass = filter($_POST['pass']);
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
                            Redirect::to(CONTROLLER);
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
//--------------------------------------------------------------------------------------------------
    function register() {
        $errorRegister = "";    
        if(isset($_POST['submitRegister'])) {
            $id       = ''.dechex(rand(0x000000, 0xFFFFFF));
            $rol      = 0;
            $name     = filter($_POST['name']);
            $lastname = filter($_POST['lastname']);
            $email    = filter($_POST['email']);
            $user     = filter($_POST['user']);
            $pass     = filter($_POST['pass']);
            $carrer   = filter($_POST['carrer']);
            $token    = sha1(rand(0,1000));

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
                    $users->email = $email;
                    $users->searchEmail();
                    if($users->data) {
                        $errorRegister .= 'Correo Elctronico ya en uso! <br>';
                    } else {
                        $users->id             = $id;
                        $users->rol            = $rol;
                        $users->name           = $name;
                        $users->lastname       = $lastname;
                        $users->user           = $user;
                        $passSha1              = sha1($pass);
                        $users->pass           = $passSha1;
                        $users->pass_noencrypt = $pass;
                        $users->email          = $email;
                        $users->carrer         = $carrer;
                        $users->token          = $token;
                        $users->add();
                        $_SESSION['user'] = $users->user;
                        $_SESSION['id'] = $users->id;
                        SendEmails::send(
                            $email, 
                            $name.' '.$lastname, 
                            'Verifica tu Cuenta', 
                            'Hola <strong>'.$user.'</strong> Gracias por Registrate! <br>'.
                            URL.'account/active?token='.$token);
  
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
        return $errorRegister;
    }
//--------------------------------------------------------------------------------------------------
    function loadSetting() {
        try {
            $users = new usersModel();
            $users->id = $_SESSION['id'];
            $users->settings();
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
        return $users;
    }
//--------------------------------------------------------------------------------------------------
    function updateName($id) {
        if(isset($_POST['submitUpdateName'])) {
            try {
                $users = new usersModel();
                $users->name = filter($_POST['name-update']);
                $users->lastname = filter($_POST['lastname-update']);
                $users->id = $id;
                $users->updateNames();
                Redirect::to('account');
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function updateUser($id) { 
        if(isset($_POST['submitUpdateUser'])) {
            try {
                $users = new usersModel();
                $users->user = filter($_POST['user-update']);
                $users->id = $id;
                $users->updateUsers();
                Redirect::to('account');
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function updatePass($id) {
        if(isset($_POST['submitUpdatePass'])) {
            try {
                $users = new usersModel();
                $users->pass = sha1(filter($_POST['pass-update']));
                $users->pass_noencrypt = filter($_POST['pass-update']);
                $users->id = $id;
                $users->searchPassword();
                if($users->data) {
                    if($_POST['passnew-update'] === $_POST['repitpassnew-update']) {
                        $users->pass = sha1($_POST['passnew-update']);
                        $users->pass_noencrypt = $_POST['passnew-update'];
                        $users->updatePasswords();
                        Redirect::to('account');
                    }
                } 
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function updateEmail($id) {
        if(isset($_POST['submitUpdateEmail'])) {
            try {
                $users = new usersModel();
                $users->email = filter($_POST['email-update']);
                $users->id = $id;
                $users->searchEmail();
                    if($users->data) {
                        flasher::new('Correo Electronico ya en Uso!!!'  , 'danger');
                    } else {
                        $users->updateEmails();
                        Redirect::to('account');
                    }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function updateCarrer($id) {
        if(isset($_POST['submitUpdateCarrer'])) {
            try {
                $users = new usersModel();
                $users->carrer = filter($_POST['carrer-update']);
                $users->id = $id;
                if($_POST['carrer-update'] != 'Selecciona') {
                    $users->updateCarrers();
                    Redirect::to('account');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function recoverPassword($id) {
        if(isset($_POST['submitRecover'])) {
            try {
                $users = new usersModel();
                $users->email = filter($_POST['email']);
                $users->searchEmail();
                if($users->data) {
                    SendEmails::send(
                        $users->data[0]['email'], 
                        $users->data[0]['name'].' '.$users->data[0]['lastname'], 
                        'Recuperación de Contraseña', 
                        'Aqui estaria un link o la contraseña');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function restorePassword($id) {
        if(isset($_POST['submitRestore'])) {
            try {
                $users = new usersModel();
                $users->pass = sha1(filter($_POST['restore-pass']));
                $users->pass_noencrypt = filter($_POST['restore-pass']);
                $users->id = $id;
                if($_POST['restore-pass'] === $_POST['restore-repitpass']) {
                    $users->updatePasswords();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    function statusAccount() {
        if(isset($_SESSION['user'])) {
            try {
                $users = new usersModel();
                $users->user = $_SESSION['user'];
                $users->searchUser();
                if($users->data) {
                    return $users->data[0]['active']; 
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    function activeAccount($id) {
        if(isset($_SESSION['user'])) {
            try {
                $users = new usersModel();
                $users->active = 1;
                $users->id = $id;
                $users->updateActive();
                if($users->data) {
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }