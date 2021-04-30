<?php

require_once($_SERVER['DOCUMENT_ROOT']."/revista/app/ajax/DBController.php");
$db_handle = new DBController();

$data = array();
$data['status'] = "true";
    if(!empty($_POST["email"])) {
        $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
        $user_count = $db_handle->numRows($query);
        if($user_count>0) {
            $data['email'] = "false";
            $data['status'] = "false";
        } else {
            $data['email'] = $_POST['email'];
        }
    }

    if(!empty($_POST["pass"])) {
        $leght = strlen($_POST["pass"]);
        if($leght<5) {
            $data['pass'] = "false";
            $data['status'] = "false";
        } 
        if($leght>5){
            $data['pass'] = $_POST['pass'];
        }
    }

    if(!empty($_POST["user"])) { 
        $leght = strlen($_POST["user"]);
        if($leght<5) {
            $data['user'] = "leght";
        } else {
            $query = "SELECT * FROM users WHERE user='" . $_POST["user"] . "'";
            $user_count = $db_handle->numRows($query);
            if($user_count>0) {
                $data['user'] = "false";
                $data['status'] = "false";
            } else {
                $data['user'] = $_POST['user'];
            }
        }
    }

    if(!empty($_POST["name"])) {
        $data['name'] = $_POST['name'];
    }

    if(!empty($_POST["lastname"])) {
        $data['lastname'] = $_POST['lastname'];
    }

    if(!empty($_POST["rol"])) {
        $data['rol'] = $_POST['rol'];
    } 

    if(!empty($_POST["carrer"])) {
        $data['carrer'] = $_POST['carrer'];
    }

    if(!empty($_POST["rolpass"])) {
        $data['rolpass'] = $_POST['rolpass'];
    }
    
    if(isset($data['rol'])){
        $data['status'] = "false";
        if($data['rol'] == "visitante") {
            $id       = ''.dechex(rand(0x000000, 0xFFFFFF)); 
            $rol      = 0;
            $name     = filter($data['name']);
            $lastname = filter($data['lastname']);
            $email    = filter($data['email']);
            $user     = filter($data['user']);
            $pass     = filter($data['pass']);
            $passSha1 = sha1($pass);
            $token    = sha1(rand(0,1000));
            $request  = 0;
            $active   = 0;

            
            $sql = "INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, password_request, active) 
            VALUES ('$id', '$rol','$name', '$lastname', '$user', '$passSha1', '$pass', '$email', '', '$token', '$request', '$active')";
            $request = $db_handle->query($sql);
            if($request) {
                folder($id);
                $data['status'] = "true";
            }
            
        }
        if($data['rol'] == "1") {
            $typepass = $data['rolpass'];
            $query = "SELECT * FROM rol WHERE id=1 AND typepass='$typepass'";
            $user_count = $db_handle->numRows($query);
            if($user_count=="1") {
                $id       = ''.dechex(rand(0x000000, 0xFFFFFF)); 
                $rol      = 1;
                $name     = filter($data['name']);
                $lastname = filter($data['lastname']);
                $email    = filter($data['email']);
                $user     = filter($data['user']);
                $pass     = filter($data['pass']);
                $passSha1 = sha1($pass);
                $carrer   = filter($data['carrer']);
                $token    = sha1(rand(0,1000));
                $request  = 0;
                $active   = 0;
    
                $sql = "INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, password_request, active) 
                VALUES ('$id', '$rol','$name', '$lastname', '$user', '$passSha1', '$pass', '$email', '$carrer', '$token', '$request', '$active')";
                $request = $db_handle->query($sql);
                if($request) {
                    folder($id);
                    $data['status'] = "true";
                }
            }
        }
        
        if($data['rol'] == "2") {
            $typepass = $data['rolpass'];
            $query = "SELECT * FROM rol WHERE id=2 AND typepass='$typepass'";
            $user_count = $db_handle->numRows($query);
            if($user_count=="1") {
                $id       = ''.dechex(rand(0x000000, 0xFFFFFF)); 
                $rol      = 2;
                $name     = filter($data['name']);
                $lastname = filter($data['lastname']);
                $email    = filter($data['email']);
                $user     = filter($data['user']);
                $pass     = filter($data['pass']);
                $passSha1 = sha1($pass);
                $token    = sha1(rand(0,1000));
                $request  = 0;
                $active   = 0;

                $sql = "INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, password_request, active) 
                VALUES ('$id', '$rol','$name', '$lastname', '$user', '$passSha1', '$pass', '$email', '', '$token', '$request', '$active')";
                $request = $db_handle->query($sql);
                if($request) {
                    folder($id);
                    $data['status'] = "true";
                }
            } 
            
        }
    } else {
        $data['status'] = "false";
    }

    function filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function folder($id_user){
        $dirDoc = $_SERVER['DOCUMENT_ROOT']."/revista/assets/uploads/$id_user/";
        if(!file_exists(($dirDoc))){
            mkdir($dirDoc, 0777);
        } 
    }
    
    echo json_encode($data);





?>