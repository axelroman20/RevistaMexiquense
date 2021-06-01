<?php
/**
 * Clase Controlador de la página de cuenta del usuario 
 * que se encarga de la todo lo referente a esta.
 */
class accountController{
    // Función que se ejecuta al iniciar la página
    function index() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');                        // Redirige al inicio
        }
         $toasts = "";
        $users = loadSetting();                          // Carga la informacion de la cuenta del usuario
         $toasts .= updateName($users->data[0]['id']);   // Modifica el nombre del usuario
         $toasts .= updateUser($users->data[0]['id']);   // Modifica el usuario
         $toasts .= updatePass($users->data[0]['id']);   // Modifica la contraseña del usuario
         $toasts .= updateEmail($users->data[0]['id']);  // Modifica el correo del usuario
         $toasts .= updateCarrer($users->data[0]['id']); // Modifica la caerra del usuario
        $active = statusAccount();                       // Verifica si la cuenta esta activada
        $data = [                                        // Captura los datos para usarlos dentro de la página
            'title'           => 'Mi Cuenta',
            'id'              => $users->data[0]['id'],
            'rol'             => $users->data[0]['rol'],
            'name'            => $users->data[0]['name'],
            'lastname'        => $users->data[0]['lastname'],
            'user'            => $users->data[0]['user'],
            'pass'            => $users->data[0]['pass'],
            'pass_noencrypt'  => $users->data[0]['pass_noencrypt'],
            'email'           => $users->data[0]['email'],
            'carrer'          => $users->data[0]['carrer'],
            'token'           => $users->data[0]['token'],
            'active'          => $active,
            'toast'           => $toasts
        ];
        search();                                        // Motor de busqueda de articulo del proyecto
        View::render('account', $data);                  // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Función que recupera la contraseña del usuario
    /**
     * Envia un correo de recuperación de contraseña al usuario
     * para que pueda cambiarla en caso de perder su antigua contraseña.
     */
    function recover_password() {
        $errorLogin = login();                   // Se encarga del inicio de sesión
        $toasts = "";
        if(isset($_SESSION['user'])) {
            $users = loadSetting();              // Carga la informacion del usuario
            $data = [                            // Captura los datos para usarlos dentro de la página
                'title'           => 'Recuperar Contraseña',
                'errorLogin'      => $errorLogin,
                'email'           => $users->data[0]['email'],
                'toast'           => $toasts
            ];
        }
                                                 
        $toasts = recoverPassword(               // Activa la recuperación de la contraseña
            isset($users->data[0]['id']) ? $users->data[0]['id'] : 'void');
        $data = [                                // Captura los datos para usarlos dentro de la página
            'title'         => 'Recuperar Contraseña', 
            'errorLogin'    => $errorLogin,
            'toast'         => $toasts
        ];
        search();                                // Motor de busqueda de articulo del proyecto
        View::render('recoverPassword', $data);  // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Función que restable la contraseña del usuario
    /**
     * Restablece la contraseña del usuario por una nueva
     * solo si antes envio una peticioón de recuperación
     */
    function restore_password() {
        $request = statusRequestPassword();     //Verifica si el usuario pidio una recuperación de contraseña
        if($request == 0) {
            Redirect::to('home');               // Redirige al inicio
        }
        $toasts = '';
        if(isset($_SESSION['user'])){
            $users = loadSetting();             // Carga los datos del usuario
        }
        $toasts = restorePassword(              // Restablece la contraseña del usuario por una nueva
            isset($_SESSION['user'])? $users->data[0]['email'] : $_GET['email']);
        $data = [                               // Captura los datos para usarlos dentro de la página
            'title' => 'Restablecer Contraseña',
            'toast' => $toasts
        ];
        search();                               // Motor de busqueda de articulo del proyecto
        View::render('restorePassword', $data); // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
    // Función que activa la cuenta del usuario
    /**
     * Activa la cuenta del usuario si esa no esta activa, se activa
     * mediante un token enviado por un correo electronico que recibe.
     */
    function active() {
        if(!isset($_SESSION['user'])){
            Redirect::to('home');              // Redirige al inicio
        }
        if(!isset($_GET['token'])){
            Redirect::to('account');           // Redirige a la cuenta del usuario
        }
        $active = statusAccount();             // Verifica si la cuenta esta activa
        $data = [                              // Captura los datos para usarlos dentro de la página
            'title'  => 'Restablecer Contraseña',
            'token'  => $_GET['token'],
            'active' => $active
        ];
        if($active == 0) { 
            activeAccount($_SESSION['id'], 1); // Activa la cuenta del usuario
        }
        search();                              // Motor de busqueda de articulo del proyecto
        View::render('active', $data);         // Renderiza la página
    }
/* -------------------------------------------------------------------------- */
   // Reenvia el correo de activacion
    /**
     * Reenvia el correo de activacion en caso de que no le haya llegado al
     * usuario puede volver a pedir que lo envien.
     */ 
    function resend() {
        // Envia el correo
        resendEmail($_GET['email'], $_GET['name'], $_GET['lastname'], $_GET['user'], $_GET['token']);
        // Recarga la página
        Redirect::to('account');
    }
/* -------------------------------------------------------------------------- */
    // Redirige al usuario a otra página
    function home() {
        Redirect::to('home');
    }
    // Redirige al usuario a otra página
    function publications() {
        Redirect::to('publications');
    }
    // Redirige al usuario a otra página
    function myarticle() {
        Redirect::to('myarticle');
    }
    // Redirige al usuario a otra página
    function account() {
        Redirect::to('account');
    }
    // Redirige al usuario a otra página
    function policiesprivacy(){
        Redirect::to('policiesprivacy');
    }
    // Redirige al usuario a la funcion close
    function close() {
        close();
    }
    // Redirige a la página anterior
    function back() {
        Redirect::to('account');
    }
    
}