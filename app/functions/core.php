<?php

    function to_object($array) {
        return json_decode(json_encode($array));
    }

    function get_sitename() {
        return 'Revista';
    }

    function now() {
        return date('Y-m-d H:i:s');
    }

    function filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function close() {
        session_start();
        session_destroy();
        $_SESSION = array();
        Redirect::to('home');
    }

    function searchEmail() {
        Database::query();
    }

    function getRealIP() {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }

    function HEX() {
        return ''.dechex(rand(0x000000, 0xFFFFFF));
    }
