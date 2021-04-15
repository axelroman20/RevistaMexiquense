<?php

// Saber si estamos trabajando de forma local o remota
define('IS_LOCAL'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

// Definir el uso horario o timezone del sistema
date_default_timezone_set('America/Mexico_City');

// Lenguaje
define('LANG'       , 'es');

// Ruta base de nuestro proyecto
//define('BASEPATH'   , IS_LOCAL ? '/proyectos/Revista/' : '');
define('BASEPATH'   , IS_LOCAL ? '/proyectos/Revista/' : '/proyectos/Revista/');

// Sal del sistema
define('AUTH_SALT'  , 'BeeFramework<3');

// Puerto y la URL del sitio
define('PORT'       , '80');
//define('URL'        , IS_LOCAL ? 'http://127.0.0.1:'.PORT.'/proyectos/Revista/' : 'https://revista-gcm.live/');
define('URL'        , IS_LOCAL ? 'http://127.0.0.1:'.PORT.'/proyectos/Revista/' : 'http://192.168.88.222'.BASEPATH);

// Las rutas de directorios y archivos
define('DS'         , DIRECTORY_SEPARATOR);
define('ROOT'       , getcwd().DS);

define('APP'        , ROOT.'app'.DS);
define('CLASSES'    , APP.'classes'.DS);
define('CONFIG'     , APP.'config'.DS);
define('CONTROLLERS', APP.'controllers'.DS);
define('FUNCTIONS'  , APP.'functions'.DS);
define('MODELS'     , APP.'models'.DS);

define('TEMPLATES'  , ROOT.'templates'.DS);
define('INCLUDES'   , TEMPLATES.'includes'.DS);
define('MODULES'    , TEMPLATES.'modules'.DS);
define('VIEWS'      , TEMPLATES.'views'.DS);

// Rutas de archivos o assets con base URL
define('ASSETS'     , URL.'assets/');
define('CSS'        , ASSETS.'css/');
define('FAVICON'    , ASSETS.'favicon/');
define('FONTS'      , ASSETS.'fonts/');
define('IMAGES'     , ASSETS.'img/');
define('JS'         , ASSETS.'js/');
define('PLUGINS'    , ASSETS.'plugins/');
define('UPLOADS'    , ASSETS.'uploads/');

// Credenciales de la base de datos
// Set para conexión local o de desarrollo
define('LDB_ENGINE' , 'mysql');
define('LDB_HOST'   , 'sql458.main-hosting.eu');
define('LDB_NAME'   , 'u730030579_revistagcm');
define('LDB_USER'   , 'u730030579_revistagcm');
define('LDB_PASS'   , 'Revista123');
define('LDB_CHARSET', 'utf8');

// Set para conexión en producción o servidor real
define('DB_ENGINE'  , 'mysql');
//define('DB_HOST'    , 'localhost');
define('DB_HOST'    , 'sql458.main-hosting.eu');
define('DB_NAME'    , 'u730030579_revistagcm');
define('DB_USER'    , 'u730030579_revistagcm');
define('DB_PASS'    , 'Revista123');
define('DB_CHARSET' , 'utf8');

// El controlador por defecto / el método por defecto / y el controlador de errores por defecto
define('DEFAULT_CONTROLLER'      , 'home');
define('DEFAULT_ERROR_CONTROLLER', 'error');
define('DEFAULT_METHOD'          , 'index');

// Configuraciones del blog
define('POST_PAGE', '6');

// Configuracion de metodos email
define('EMAIL_USER', 'soporte@revista-gcm.live');
define('EMAIL_PASS', 'Revista123');
define('EMAIL_HOST', 'smtp.hostinger.mx');
define('EMAIL_PORT', '587');
define('EMAIL_NAME', 'RevistaGCM');
