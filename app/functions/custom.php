<?php
//--------------------------------------------------------------------------------------------------
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
                $users->name = $_POST['name-update'];
                $users->lastname = $_POST['lastname-update'];
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
                $users->user = $_POST['user-update'];
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
                $users->pass = sha1($_POST['pass-update']);
                $users->pass_noencrypt = $_POST['pass-update'];
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
                $users->email = $_POST['email-update'];
                $users->id = $id;
                $users->updateEmails();
                Redirect::to('account');
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
                $users->carrer = $_POST['carrer-update'];
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
                $users->email = $_POST['email'];
                $users->searchEmail();
                if($users->data) {
                    echo $_POST['email'];
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
                $users->pass = sha1($_POST['restore-pass']);
                $users->pass_noencrypt = $_POST['restore-pass'];
                $users->id = $id;
                if($_POST['restore-pass'] === $_POST['restore-repitpass']) {
                    $users->updatePasswords();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }