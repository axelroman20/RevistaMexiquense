<?php
/**
 * Funciónes principales del proyecto. Estas suele 
 * ser usadas mas de 5 veces en el codigo.
 */

/**
 * Funcióm que combierte arreglos en archivos json
 * 
 * @param array $array
 * @return json
 */
function to_object($array) {
    return json_decode(json_encode($array));
}

/**
 * Retorna el nombre del proyecto
 * 
 * @return string
 */
function get_sitename() {
    return 'Revista';
}


/**
 * Retorna la fecha actual
 * 
 * @return date
 */
function now() {
    return date('Y-m-d H:i:s');
}


/**
 * Sanitiza los datos entrastes y retorna el valor limpio
 * 
 * @param string $data
 * @return string
 */
function filter($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Cierra y destruye la sesion del usuario actual
 * 
 * @return void
 */
function close() {
    session_start();
    session_destroy();
    $_SESSION = array();
    Redirect::to('home');
}

/**
 * Obtiene la dirección ip del usuario y la retorna
 * 
 * @return string
 */
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

/**
 * Genera un valor hexadecimal y lo retorna en cadena de texto
 * 
 * @return string
 */
function HEX() {
    return ''.dechex(rand(0x000000, 0xFFFFFF));
}
