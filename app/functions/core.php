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