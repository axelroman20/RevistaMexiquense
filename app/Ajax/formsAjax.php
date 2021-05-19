<?php
/* ------------------- Requiere el archivo de la conexion ------------------- */
require_once "DBController.php";

Class formsAjax {
    public $data = array();
/* ---------------- Funcion que valida el correo del usuario ---------------- */
    /**
     * Funcion para validar si el correo ya existe
     * @return array
     */
    public function validateStep1() {
        $db_handle = new DBController();
        $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
        $user_count = $db_handle->numRows($query);
        if($user_count>0) {
            $data['email'] = "false";
        } else {
            $data['email'] = $_POST["email"];
        }

        $leght = strlen($_POST["pass"]);
        if($leght<5) {
            $data['pass'] = "false";
        } 
        if($leght>5){
            $data['pass'] = $_POST['pass'];
        }
        echo json_encode($data);
    }
/* ----------------- Funcion que valida el nombre de usuario ---------------- */
    /**
     * Funcion para validar usario, nombre y apellido
     * @return array
     */
    public function validateStep2() {
        $db_handle = new DBController();
        $leght = strlen($_POST["user"]);
        if($leght<5) {
            $data['user'] = "leght";
        } else {
            $query = "SELECT * FROM users WHERE user='" . $_POST["user"] . "'";
            $user_count = $db_handle->numRows($query);
            if($user_count>0) {
                $data['user'] = "false";
            } else {
                $data['user'] = $_POST['user'];
                $data['name'] = $_POST['name'];
                $data['lastname'] = $_POST['lastname'];
            }
        }
        echo json_encode($data);
    }
/* ------------- Funcion que registra los datos el nuevo usuario ------------ */
    /**
     * Funcion que registra al usuario nuevo
     * @return array
     */
    public function registerStep3() {
        $db_handle = new DBController();
        if(isset($_POST['submitRol'])){
            $data['status'] = "true";
            if($_POST['submitRol'] == "visitante") {
                /* -------------------------- */
                $id = ''.dechex(rand(0x000000, 0xFFFFFF)); 
                /* -------------------------- */
                $rol = 0;
                /* -------------------------- */
                $name = $_POST['submitName'];
                $name = trim($name);
                $name = stripslashes($name);
                $name = htmlspecialchars($name);
                /* -------------------------- */
                $lastname = $_POST['submitLastname'];
                $lastname = trim($lastname);
                $lastname = stripslashes($lastname);
                $lastname = htmlspecialchars($lastname);
                /* -------------------------- */
                $email = $_POST['submitEmail'];
                $email = trim($email);
                $email = stripslashes($email);
                $email = htmlspecialchars($email);
                /* -------------------------- */
                $user = $_POST['submitUser'];
                $user = trim($user);
                $user = stripslashes($user);
                $user = htmlspecialchars($user);
                /* -------------------------- */
                $pass = $_POST['submitPass'];
                $pass = trim($pass);
                $pass = stripslashes($pass);
                $pass = htmlspecialchars($pass);
                /* -------------------------- */
                $passSha1 = sha1($pass);
                /* -------------------------- */
                $token    = sha1(rand(0,1000));
                /* -------------------------- */
                $request  = 0;
                /* -------------------------- */
                $active   = 0;
                /* -------------------------- */
                $sql = "INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, password_request, active) 
                VALUES ('$id', '$rol','$name', '$lastname', '$user', '$passSha1', '$pass', '$email', '', '$token', '$request', '$active')";
                $request = $db_handle->query($sql);
                if($request) {
                    /* -------------------------- */
                    $dirDoc = "../../assets/uploads/$id";
                    if(!file_exists(($dirDoc))){
                        mkdir($dirDoc, 0777);
                    } 
                    /* -------------------------- */
                    $data['status'] = "true";
                }
            }
            if($_POST['submitRol'] == "1") {
                $typepass = $_POST['submitRolpass'];
                $query = "SELECT * FROM rol WHERE id=1 AND typepass='$typepass'";
                $user_count = $db_handle->numRows($query);
                if($user_count=="1") {
                    /* -------------------------- */
                    $id = ''.dechex(rand(0x000000, 0xFFFFFF)); 
                    /* -------------------------- */
                    $rol = 1;
                    /* -------------------------- */
                    $name = $_POST['submitName'];
                    $name = trim($name);
                    $name = stripslashes($name);
                    $name = htmlspecialchars($name);
                    /* -------------------------- */
                    $lastname = $_POST['submitLastname'];
                    $lastname = trim($lastname);
                    $lastname = stripslashes($lastname);
                    $lastname = htmlspecialchars($lastname);
                    /* -------------------------- */
                    $email = $_POST['submitEmail'];
                    $email = trim($email);
                    $email = stripslashes($email);
                    $email = htmlspecialchars($email);
                    /* -------------------------- */
                    $user = $_POST['submitUser'];
                    $user = trim($user);
                    $user = stripslashes($user);
                    $user = htmlspecialchars($user);
                    /* -------------------------- */
                    $pass = $_POST['submitPass'];
                    $pass = trim($pass);
                    $pass = stripslashes($pass);
                    $pass = htmlspecialchars($pass);
                    /* -------------------------- */
                    $passSha1 = sha1($pass);
                    /* -------------------------- */
                    $carrer = $_POST['submitCarrer'];
                    $carrer = trim($carrer);
                    $carrer = stripslashes($carrer);
                    $carrer = htmlspecialchars($carrer);
                    /* -------------------------- */
                    $token    = sha1(rand(0,1000));
                    /* -------------------------- */
                    $request  = 0;
                    /* -------------------------- */
                    $active   = 0;
                    /* -------------------------- */        
                    $sql = "INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, password_request, active) 
                    VALUES ('$id', '$rol','$name', '$lastname', '$user', '$passSha1', '$pass', '$email', '$carrer', '$token', '$request', '$active')";
                    $request = $db_handle->query($sql);
                    if($request) {
                        /* -------------------------- */
                        $dirDoc = "../../assets/uploads/$id";
                        if(!file_exists(($dirDoc))){
                            mkdir($dirDoc, 0777);
                        } 
                        /* -------------------------- */
                        $data['status'] = "true";
                    }
                } else {
                    $data['status'] = "false";
                }
            }
        } else {
            $data['status'] = "false";
        }
        echo json_encode($data);
    }
/* ------------------ Funcion para ver la cantidad de views ----------------- */
    public function getViews() {
        $db_handle = new DBController();
        $query = "SELECT views FROM article WHERE id='" . $_POST["id_article"] . "'";
        $data = $db_handle->runQuery($query);
        echo json_encode($data);
    }
}

/* ----------------------- Llama la funcion del paso 1 ---------------------- */
if(isset($_POST['email']) && isset($_POST['pass'])) {
    $valEmail = new formsAjax();
    $valEmail->validateStep1();
}
/* ----------------------- Llama la funcion del paso 2 ---------------------- */
if(isset($_POST['user']) && isset($_POST['name']) && isset($_POST['lastname'])) {
    $valUser = new formsAjax();
    $valUser->validateStep2();
}
/* ----------------------- Llama la funcion del paso 3 ---------------------- */
if(isset($_POST['submit'])){
    $valUser = new formsAjax();
    $valUser->registerStep3();
}
/* ------------------ Llamar la funcion para ver las views ------------------ */
if(isset($_POST['views'])) {
    $valView = new formsAjax();
    $valView->getViews();
}
