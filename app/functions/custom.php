<?php

    /**
     * Metodo para inicio de sesion de usuario
     * @return string
     */
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
                            $_SESSION['user']   = $users->user;
                            $_SESSION['id']     = $users->data[0]['id'];
                            $_SESSION['rol']    = $users->data[0]['rol'];
                            $_SESSION['carrer'] = $users->data[0]['carrer'];
                            $_SESSION['search'] = '';
                            $_GET['id'] = '';
                            Redirect::to(CONTROLLER);
                        }
                    } else {
                        $errorLogin .= "
                            <script>
                                toastr.error('Usuario o Contraseña Incorrecta', 'No se pudo iniciar session!');
                            </script>";
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
        return $errorLogin;
    }

    /**
     * Metodo para registrar un usuario
     * @return string
     */
    function register() {
        $errorRegister = "";    
        if(isset($_POST['submitRegister'])) {
            $id       = ''.dechex(rand(0x000000, 0xFFFFFF));
            $rol      = filter($_POST['rol']);
            $name     = filter($_POST['name']);
            $lastname = filter($_POST['lastname']);
            $email    = filter($_POST['email']);
            $user     = filter($_POST['user']);
            $pass     = filter($_POST['pass']);
            $carrer   = filter($_POST['carrer']);
            $request  = 0;
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
            if(empty($rol)) {
                $errorRegister .= "
                    <script>
                        $('.labelrol_register').addClass('errorLabel');
                        $('.inputrol_register').addClass('errorInput');
                    </script>";
            } 
            if(empty($carrer)) {
                $errorRegister .= "
                    <script>
                        $('.labelcarrer_register').addClass('errorLabel');
                        $('.inputcarrer_register').addClass('errorInput');
                    </script>";
            } 

            if(empty($errorRegister)) {
                try {
                    $users->id               = $id;
                    $users->rol              = $rol;
                    $users->name             = $name;
                    $users->lastname         = $lastname;
                    $users->user             = $user;
                    $passSha1                = sha1($pass);
                    $users->pass             = $passSha1;
                    $users->pass_noencrypt   = $pass;
                    $users->email            = $email;
                    $users->carrer           = $carrer;
                    $users->token            = $token;
                    $users->requestPassword  = $request;
                    $users->add();
                    if($users->data) {
                        $_SESSION['user']   = $users->user;
                        $_SESSION['id']     = $users->id;
                        $_SESSION['rol']    = $users->rol;
                        $_SESSION['carrer'] = $carrer;
                        $_SESSION['search'] = '';
                        
                    } else {
                        $errorRegister .= "
                            <script>
                                toastr.error('Revisa tu información algo puede estar mal.', 'Registro no realizado!');
                            </script>";
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
        return $errorRegister;
    }  
//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para cargar datos de cuenta del usuario
     * @return array
     */
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
    /**
     * Metodo para actualizar el nombre del usuario
     * @return string
     */
    function updateName($id) {
        if(isset($_POST['submitUpdateName'])) {
            try {
                $users = new usersModel();
                $users->name = filter($_POST['name-update']);
                $users->lastname = filter($_POST['lastname-update']);
                $users->id = $id;
                $users->updateNames();
                if($users->data) {
                    return "
                        <script>
                            toastr.success('Nombre y Apellido Actualizado', 'Datos Guardados!');
                        </script>";
                    Redirect::to('account');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para actualizar el usuario del usuario
     * @return string
     */
    function updateUser($id) { 
        if(isset($_POST['submitUpdateUser'])) {
            try {
                $users = new usersModel();
                $users->user = filter($_POST['user-update']);
                $users->id = $id;
                $users->searchUser();
                    if($users->data) {
                        return "
                            <script>
                                toastr.error('', 'Usuario Ya Existente!');            
                            </script>";
                    } else {
                        $users->updateUsers();
                        if($users->data) {
                            $_SESSION['user'] = filter($_POST['user-update']);
                            return "
                                <script>
                                    toastr.success('Usuario Actualizado', 'Datos Guardados!');
                                </script>";
                        }
                    }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para actualizar la contraseña del usuario
     * @return string
     */
    function updatePass($id) {
        $toasts = '';
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
                        return "
                            <script>
                                toastr.success('Contraseña Actualizado', 'Datos Guardados!');
                            </script>";
                        Redirect::to('account');
                    } else {
                        return "
                            <script>
                                toastr.error('', 'Contraseñas no coinciden!');
                            </script>";
                    }
                } else {
                    return "
                        <script>
                            toastr.error('', 'Contraseña Actual Incorrecta');
                        </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para actualizar el correo del usuario
     * @return string
     */
    function updateEmail($id) {
        $toasts = '';
        if(isset($_POST['submitUpdateEmail'])) {
            try {
                $users = new usersModel();
                $users->email = filter($_POST['email-update']);
                $users->id = $id;
                $users->searchEmail();
                    if($users->data) {
                        return "
                            <script>
                                toastr.error('', 'Correo Electronico Ya Existente!');            
                            </script>";
                    } else {
                        $users->updateEmails();
                        activeAccount($_SESSION['id'], 0);
                        return "
                            <script>
                                toastr.success('Correo Electronico Actualizado', 'Datos Guardados!');
                            </script>";
                        Redirect::to('account');
                    }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para actualizar la carrera del usuario
     * @return string
     */
    function updateCarrer($id) {
        $toasts = '';
        if(isset($_POST['submitUpdateCarrer'])) {
            try {
                $users = new usersModel();
                $users->carrer = $_POST['carrer-update'];
                $users->id = $id;
                if($_POST['carrer-update'] != 'Selecciona') {
                    $users->updateCarrers();
                    return "
                        <script>
                            toastr.success('Carrera Actualizada', 'Datos Guardados!');
                        </script>";
                    Redirect::to('account');
                } else {
                    return "
                        <script>
                            toastr.error('', 'Carrera Error!'); 
                        </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para reenviar correo de activacion
     * @return void
     */
    function resendEmail($email, $name, $lastname, $user, $token) {
        SendEmails::send(
            $email, 
            $email.' '.$lastname, 
            'Verifica tu Cuenta', 
            'Hola <strong>'.$user.'</strong> Gracias por Registrate! <br>'.
            URL.'account/active?token='.$token);
    }

    /**
     * Metodo para enviar correo de recuperacion de contraseña
     * @return string
     */
    function recoverPassword($id) {
        if(isset($_POST['submitRecover'])) {
            try {
                $users = new usersModel();
                $users->email = $_POST['email'];
                $users->searchEmail();
                if($users->data) {
                    SendEmails::send(
                        $users->data[0]['email'], 
                        $users->data[0]['name'].' '.$users->data[0]['lastname'], 
                        'Recuperación de Contraseña', 
                        'Hola <strong>'.$users->data[0]['user'].'</strong> Has Solcitado una Recuperacion de Contraseña <br>
                        Porfavor Haz Click en el Link para Recuperar tu Contraseña: <br>'.
                        URL.'account/restore_password?token='.$users->data[0]['token'].'&email='.$users->data[0]['email']);
                    restoreRequestPassword($users->data[0]['id'], 1);
                    return "
                        <script>
                            toastr.success('Revisa tu bandeja de entrada para verificar tu cuenta', 'Correo Enviado!');
                        </script>";
                } else {
                    return "
                        <script>
                            toastr.error('', 'Correo no Encontrado');
                        </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para restablecer contraseña del usuario
     * @return string
     */
    function restorePassword($email) {
        if(isset($_POST['submitRestore'])) {
            try {
                $users = new usersModel();
                $users->email = $email;
                $users->searchEmail();
                $id = $users->data[0]['id'];
                $users = new usersModel();
                $users->pass = sha1(filter($_POST['restore-pass']));
                $users->pass_noencrypt = filter($_POST['restore-pass']);
                $users->id = $id;
                if($_POST['restore-pass'] === $_POST['restore-repitpass']) {
                    $users->updatePasswords();
                    if($users->data) {
                        restoreRequestPassword($id, 0);
                        return "
                            <script>
                                toastr.success('Contraseña Actualizada', 'Datos Guardados!');
                            </script>";
                    } else {
                        
                    return "
                        <script>
                            toastr.error('', 'Contraseña Error!'); 
                        </script>";
                    }
                } else {
                    return "
                        <script>
                            toastr.error('', 'Contraseñas no Coinciden!');
                        </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }
    
    /**
     * Metodo para activar la recuperacion de contraseña
     * @return void
     */
    function restoreRequestPassword($id, $value) {
        try {
            $users = new usersModel();
            $users->password_request = $value;
            $users->id = $id;
            $users->requestPassword();
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    /**
     * Metodo para ver el estado de cuenta del usuario
     * @return int
     */
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

    /**
     * Metodo para activar la cuenta del usuario
     * @return void
     */
    function activeAccount($id, $status) {
        if(isset($_SESSION['user'])) {
            try {
                $users = new usersModel();
                $users->active = $status;
                $users->id = $id;
                $users->updateActive();
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para ver el estado de peticion de restablecion de contraseña
     * @return int
     */
    function statusRequestPassword() {
        if(isset($_GET['token'])) {
            try {
                $users = new usersModel();
                $users->email = $_GET['email'];
                $users->searchEmail();
                if($users->data) {
                    return $users->data[0]['password_request']; 
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para saber en que numero de pagina se encuentra
     * @return int
     */
    function pageNow() {
        return isset($_GET['p']) ? (int) $_GET['p'] : 1;
    }

    /**
     * Metodo para consegir todos los articulos creados
     * @return array
     */
    function getPost($post_page) {
        $start = (pageNow() > 1) ? pageNow() * $post_page - $post_page : 0;
        try {
            $article = new articleModel();
            $article->post_page  = $post_page;
            $article->post_start = $start;
            $article->getPosts();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $article->data;
    }

    /**
     * Metodo para consegir todos los articulos creados
     * por el id de articulo
     * @return array
     */
    function getPostId($id) {
        try {
            $article = new articleModel();
            $article->id = $id;
            $article->getPostsId();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $article->data;
    }

    /**
     * Metodo para consegir todos los articulos creados
     * que el usuario creo
     * @return array
     */
    function getPostUser($user) {
        try {
            $article = new articleModel();
            $article->user = $user;
            $article->getPostsUser();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $article->data;
    }

    /**
     * Metodo para traer los articulos
     * por cantidad de likes
     * @return array
     */
    function getPostLikes($post_page) {
        $start = (pageNow() > 1) ? pageNow() * $post_page - $post_page : 0;
        try {
            $article = new articleModel();
            $article->post_page  = $post_page;
            $article->post_start = $start;
            $article->getPostsLikes();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $article->data; 
    }

    /**
     * Metodo para traer los articulos
     * por cantidad views
     * @return array
     */
    function getPostViews($post_page) {
        $start = (pageNow() > 1) ? pageNow() * $post_page - $post_page : 0;
        try {
            $article = new articleModel();
            $article->post_page  = $post_page;
            $article->post_start = $start;
            $article->getPostsViews();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $article->data; 
    }

    /**
     * Metodo para traer los comentarios 
     * del articulo
     * @return array
     */
    function getComments($id) {
        try {
            $article = new articleModel();
            $article->id_article = $id;
            $article->getPostsComments();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $article->data;
    }

    /**
     * Metodo para crear los comentarios 
     * del articulo
     * @return array
     */
    function setComments($id_article) {
        if(isset($_POST['submitComment'])) {
            $id = ''.dechex(rand(0x000000, 0xFFFFFF));
            $id_user    = $_SESSION['id'];
            $user       = $_SESSION['user'];
            $comment    = $_POST['comment'];
            try {
                $article = new articleModel();
                $article->id = $id;
                $article->id_article = $id_article;
                $article->id_user = $id_user;
                $article->user = $user;
                $article->comment = $comment;
                $article->setPostsComments();
                return $article->data;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * Metodo para eliminar comentarios 
     * del articulo
     * @return array
     */
    function deleteComment($id_comment) {
        try {
            $article = new articleModel();
            $article->id = $id_comment;
            $article->deleteComments();
            return $article->data;
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    /**
     * Metodo para ver si ya se dio un like  
     * al articulo
     * @return void
     */
    function existslike($id_article) {
        try {
            $article = new articleModel();
            $article->id_article = $id_article;
            $article->id_user = $_SESSION['id'];
            $article->existsLike();
            if($article->data) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Metodo para dar un like  
     * al articulo
     * @return void
     */
    function addlike($id_article, $likes) {
        if(isset($_POST['submitLikes'])) {
            try {
                $article = new articleModel();
                $id = ''.dechex(rand(0x000000, 0xFFFFFF));
                $article->id = $id;
                $article->id_article = $id_article;
                $article->likes = $likes+1;
                $article->addLikes();
                $article->id_user = $_SESSION['id'];
                $article->user = $_SESSION['user'];
                $article->addLikesLog();
                return true;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * Metodo para quitar un like  
     * al articulo
     * @return void
     */
    function sublike($id_article, $likes) {
        if(isset($_POST['submitLikes'])) {
            try {
                $article = new articleModel();
                $article->id_article = $id_article;
                if($likes<=0){
                    $article->likes = 0;
                } else {
                    $article->likes = $likes-1;
                }
                $article->subLikes();
                $article->id_user = $_SESSION['id'];
                $article->user = $_SESSION['user'];
                $article->subLikesLog();
                return true;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * Metodo para filtrar el id articulo
     * @return int
     */
    function idArticle($id) {
        return (int) filter($id);
    }

    /**
     * Metodo para crear el numero
     * de paginas que hay
     * @return int
     */
    function pagination($post_page) {
        try { 
            $article = new articleModel();
            $article->getNumPages();
            $data = $article->data[0][0];
            $numPage = ceil($data / $post_page);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $numPage;
    }

    /**
     * Metodo para dale formato de fecha
     * al timestamp de la base de datos
     * @return string
     */
    function getDateFilter($date) {
        $timestamp = strtotime($date);
        $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $day = date('d', $timestamp);
        $month = date('m', $timestamp)-1;
        $year = date('Y', $timestamp);
        $date = "$day de $months[$month] del $year";
        return $date;
    }

    /**
     * Metodo para dale formato a la carrera
     * @return string
     */
    function getCarrerFilter($carrer) {
        $carrers = [
            'Ninguno',
            'Ingeniería En Sistemas',
            'Ingenieria Industrial',
            'Psicologia', 
            'Derecho', 
            'Arquitectura', 
            'Ciencias de la Educación', 
            'Contaduria', 
            'Diseño Digital', 
            'Enfermeria', 
            'Informática Administrativa', 
            'Mercadotecnia',
            'Negocios Internacionales',
            'Pedagogía'
        ];
        return $carrers[$carrer];
    }

    /**
     * Metodo para dale formato al rol
     * @return string
     */
    function getRolFilter($rol) {
        $rols = [
            'Visitante',
            'Estudiante',
            'Administrador'
        ];
        return $rols[$rol];
    }

//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para cargar el articulo
     * @return array
     */
    function loadArticle($id) {
        try {
        $article = new articleModel();
        $article->id = $id;
        $article->getPostsId();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
        return $article;
    }

    /**
     * Metodo para crear un articulo
     * @return string
     */
    function addArticle(){
        if(isset($_POST['submitArticleNew'])) {
            $id          = ''.dechex(rand(0x000000, 0xFFFFFF));
            $id_user     = $_SESSION['id'];
            $user        = $_SESSION['user'];
            $carrer      = $_SESSION['carrer'];
            $title       = filter($_POST['title']);
            $description = filter($_POST['description']);
            $thumb = '';
            $filr = '';
            if($_FILES['thumb']['error'] == 0) {
                $sizeThumb = 62500; // kb
                $extListThumb = array('png', 'jpg', 'jpeg');
                $extFileThumb = explode(".", $_FILES['thumb']['name']);
                $extThumb = strtolower(end($extFileThumb));
                iF(in_array($extThumb, $extListThumb)){
                    if($_FILES['thumb']['size']<($sizeThumb * 1024)){
                        $thumb = $id.'_thumb.'.$extThumb;
                    } else {
                        return "
                            <script>
                                toastr.error('Tamaño máximo permitido 64MB', 'Demaciado Grande!');
                            </script>";
                    }
                } else {
                    return "
                        <script>
                            toastr.error('Imagenes permitidas .png .jpg. jpeg', 'Tipo no Aceptado!');
                        </script>";
                }
            } else {
                return "
                    <script>
                        toastr.error('Porfavor agregar una imagen previa', 'Vacio?');
                    </script>";
            }

            if($_FILES['file']['error'] == 0){
                $size = 62500; // kb
                $extList = 'pdf';
                $extFile = explode(".", $_FILES['file']['name']);
                $ext = strtolower(end($extFile));
                iF($ext == $extList){
                    if($_FILES['file']['size']<($size * 1024)){
                        $file = $id.'_doc.'.'pdf';
                    } else {
                        return "
                            <script>
                                toastr.error('Archivo excede el tamaño permitido', 'Demaciado Grande!');
                            </script>";
                    }
                } else {
                    return "
                        <script>
                            toastr.error('Archivos permitidos .pdf', 'Tipo no Aceptado!');
                        </script>";
                }
            } else {
                return "
                    <script>
                        toastr.error('Porfavor agregar un archivo', 'Vacio?');
                    </script>";
            }
            
            
            $dirDoc = "./assets/uploads/$id_user/";
            $urlDoc = $dirDoc.$file;
            $dirThumb = "./assets/uploads/$id_user/";
            $urlThumb = $dirThumb.$thumb;
            if(!file_exists(($dirDoc))){
                mkdir($dirDoc, 0777);
            } 
            if(move_uploaded_file($_FILES['file']['tmp_name'], $urlDoc)){
                //return "toastr.success('El archivo se cargo correctamente', 'Archivo Subido!');";
            } else {
                return "
                    <script>
                        toastr.error('', 'Error al cargar archivo!');     
                    </script>";
            }
            if(!file_exists(($dirThumb))){
                mkdir($dirThumb, 0777);
            }
            if(move_uploaded_file($_FILES['thumb']['tmp_name'], $urlThumb)){
                //return "toastr.success('El archivo se cargo correctamente', 'Archivo Subido!');";
            } else {
                return "
                    <script>
                        toastr.error('', 'Error al cargar archivo!');        
                    </script>";
            }
            
            try { 
                $article = new articleModel();
                $article->id          = $id;
                $article->id_user     = $id_user;
                $article->user        = $user;
                $article->carrer      = $carrer;
                $article->title       = $title;
                $article->description = $description;
                $article->thumb       = $thumb;
                $article->file        = $file;
                $article->add();
                if(!$article->data) {
                    return "
                        <script>
                            toastr.success('Se a subido tu articulo Correctamente!', 'Articulo Subido!');
                        </script>";
                } else {
                    return "
                        <script>
                            toastr.error('No se pudo subir el articulo', 'Error del Articulo!');
                        </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                return "
                    <script>
                        toastr.error('".$e->getMessage()."', 'Error Excepcion!');
                    </script>";
            }
        }
    }

    /**
     * Metodo para editar un articulo
     * @return string
     */
    function editArticle($d) {
        if(isset($_POST['submitArticleEdit'])) {
            $id = $d->data[0]['id'];
            $title       = filter($_POST['title']);
            $description = filter($_POST['description']);
            $thumb = '';
            $file = '';

            if($_FILES['thumb']['error'] == 0) {
                $sizeThumb = 62500; // kb
                $extListThumb = array('png', 'jpg', 'jpeg');
                $extFileThumb = explode(".", $_FILES['thumb']['name']);
                $extThumb = strtolower(end($extFileThumb));
                iF(in_array($extThumb, $extListThumb)){
                    if($_FILES['thumb']['size']<($sizeThumb * 1024)){
                        unlink('./assets/uploads/'.$d->data[0]['id_user'].'/'.$d->data[0]['thumb']);
                        $thumb = $d->id.'_thumb.'.$extThumb;
                        $dirThumb = "./assets/uploads/".$_SESSION['id']."/";
                        $urlThumb = $dirThumb.$thumb;
                        if(!file_exists(($dirThumb))){
                            mkdir($dirThumb, 0777);
                        }
                        if(move_uploaded_file($_FILES['thumb']['tmp_name'], $urlThumb)){
                            //return "toastr.success('El archivo se cargo correctamente', 'Archivo Subido!');";
                        } else {
                            return "
                                <script>
                                    toastr.error('', 'Error al cargar archivo!');
                                </script>";
                        }
                    } else {
                        return "
                            <script>
                                toastr.error('Tamaño máximo permitido 64MB', 'Demaciado Grande!');
                            </script>";
                    }
                } else {
                    return "
                        <script>
                            toastr.error('Imagenes permitidas .png .jpg. jpeg', 'Tipo no Aceptado!');  
                        </script>";
                }
            } else {
                $thumb = $d->data[0]['thumb'];
            }
            
            if($_FILES['file']['error'] == 0){
                $size = 62500; // kb
                $extList = 'pdf';
                $extFile = explode(".", $_FILES['file']['name']);
                $ext = strtolower(end($extFile));
                iF($ext == $extList){
                    if($_FILES['file']['size']<($size * 1024)){
                        unlink('./assets/uploads/'.$d->data[0]['id_user'].'/'.$d->data[0]['file']);
                        $file = $d->id.'_doc.'.'pdf';
                        $dirDoc = "./assets/uploads/".$_SESSION['id']."/";
                        $urlDoc = $dirDoc.$file;
                        if(!file_exists(($dirDoc))){
                            mkdir($dirDoc, 0777);
                        } 
                        if(move_uploaded_file($_FILES['file']['tmp_name'], $urlDoc)){
                            //return "toastr.success('El archivo se cargo correctamente', 'Archivo Subido!');";
                        } else {
                            return "
                                <script>
                                    toastr.error('', 'Error al cargar archivo!');
                                </script>";
                        }
                    } else {
                        return "
                            <script>
                                toastr.error('Archivo excede el tamaño permitido', 'Demaciado Grande!');
                            </script>";
                    }
                } else {
                    return "
                        <script>
                            toastr.error('Archivos permitidos .pdf', 'Tipo no Aceptado!');  
                        </script>";
                }
            } else {
                $file = $d->data[0]['file'];
            }

            try {
                $article = new articleModel();
                $article->title = $title ;
                $article->description = $description;
                $article->thumb = $thumb;
                $article->file = $file;
                $article->id = $_GET['article'];
                $article->edit();
                if($article->data) {
                    return "
                        <script>
                            toastr.success('Se modifico el articulo correctamente!', 'Articulo Modificado!');    
                        </script>";
                } else {
                    return "
                        <script>
                            toastr.error('No se pudo modificar el articulo', 'Error del Articulo!');
                        </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para eliminar un articulo
     * @return string
     */
    function deleteArticle($d) {
        try {
            unlink('./assets/uploads/'.$d->data[0]['id_user'].'/'.$d->data[0]['thumb']);
            unlink('./assets/uploads/'.$d->data[0]['id_user'].'/'.$d->data[0]['file']);
            $article = new articleModel();
            $article->id = filter($_GET['article']);
            $article->delete();
            if($article->data) {
                return "
                    <script>
                        toastr.success('Se elimino el articulo correctamente!', 'Articulo Modificado!');          
                    </script>";
            } else {
                return "
                    <script>
                        toastr.error('No se pudo eliminar el articulo', 'Error del Articulo!');   
                    </script>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }
    
//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para enviar datos de la busqueda y
     * enviarlo a la pagina de busqueda
     * @return void
     */
    function search() {
        if(isset($_POST['submitSearch'])) {
            $search = filter($_POST['search']);
            Redirect::to('publications/search?s='.$search);
        }
    }

    /**
     * Metodo para traer articulos buscados por medio
     * de la busqueda realizada
     * @return array
     */
    function searchPost() {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['s'])) {
            $search = filter($_GET['s']);
            try {
                $article = new articleModel();
                $article->search = "%$search%";
                $article->search();
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
            return $article->data;
        } else {
            Redirect::to('error');
        }
    }

//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para incrementar views de un articulo
     * @return void
     */
    function views($id, $views) {
        try {
            $article = new articleModel();
            $article->views = $views+1;
            $article->id = $id;
            $article->setViews();
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
        
    }

//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para mostrar todos los usuarios
     * @return array
     */
    function getAllUser() {
        try {
            $cpanel = new cpanelModel();
            if(empty($_GET['search'])){
                $cpanel->getUsers();
            } else {
                $cpanel->search = $_GET['search'];
                $cpanel->getUserSearch();
            }
            return $cpanel->data;
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }
    
    /**
     * Metodo para mostrar los usuarios por id
     * @return array
     */
    function getAllUserId($id) {
        try {
            $cpanel = new cpanelModel();
            $cpanel->id = $id;
            $cpanel->getUserId();
            return $cpanel->data;
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    /**
     * Metodo para crear un nuevo usuario
     * @return String
     */
    function addUserAdmin() {
        $error = '';
        if(isset($_POST['addUsers'])){
            $id       = ''.dechex(rand(0x000000, 0xFFFFFF));
            $rol      = filter($_POST['rol']);
            $name     = filter($_POST['name']);
            $lastname = filter($_POST['lastname']);
            $user     = filter($_POST['user']);
            $pass     = filter($_POST['pass']);
            $email    = filter($_POST['email']);
            $carrer   = filter($_POST['carrer']);
            $token    = sha1(rand(0,1000));
            $active   = filter($_POST['active']);
            $request  = 0;
            try {
                $cpanel = new cpanelModel();
                $cpanel->user = $user;
                $cpanel->searchUser();
                if($cpanel->data){
                    return "
                        <script>
                            toastr.error('', 'Usuario Ya Existente!');            
                        </script>";
                }

                $cpanel->email = $email;
                $cpanel->searchEmail();
                if($cpanel->data){
                    return "
                        <script>
                            toastr.error('', 'Correo Electronico Ya Existente!');            
                        </script>";
                }

                if(empty($carrer)) {
                    $carrer = 0;
                }

                if($active=="true") {
                    $active = 1;
                }
                if($active=="false") {
                    $active = 0;
                }

                if(empty($error)) {
                    try {
                        $cpanel->id               = $id;
                        $cpanel->rol              = $rol;
                        $cpanel->name             = $name;
                        $cpanel->lastname         = $lastname;
                        $cpanel->user             = $user;
                        $passSha1                 = sha1($pass);
                        $cpanel->pass             = $passSha1;
                        $cpanel->pass_noencrypt   = $pass;
                        $cpanel->email            = $email;
                        $cpanel->carrer           = $carrer;
                        $cpanel->token            = $token;
                        $cpanel->requestPassword  = $request;
                        $cpanel->active           = $active;
                        $cpanel->addUsers();
                        if($cpanel->data) {
                            $dirDoc = "./assets/uploads/$id/";
                            if(!file_exists(($dirDoc))){
                                mkdir($dirDoc, 0777);
                            } 
                            return "
                                <script>
                                    toastr.success('', 'Usuario Creado Correctamente!');            
                                </script>";
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    } 
                }


            } catch (Exception $e) {
                echo $e->getMessage();
            } 

        }
    }

    /**
     * Metodo para editar los dato de la cuenta
     * @return string
     */
    function editUserAdmin() {
        if(isset($_POST['submitEdit'])) {
            $id       = filter($_POST['id']);
            $rol      = filter($_POST['rol']);
            $name     = filter($_POST['name']);
            $lastname = filter($_POST['lastname']);
            $user     = filter($_POST['user']);
            $pass     = filter($_POST['pass']);
            $email    = filter($_POST['email']);
            $carrer   = filter($_POST['carrer']);
            $active   = filter($_POST['active']);
            try {
                $cpanel = new cpanelModel();
                $cpanel->id               = $id;
                $cpanel->rol              = $rol;
                $cpanel->name             = $name;
                $cpanel->lastname         = $lastname;
                $cpanel->user             = $user;
                $passSha1                 = sha1($pass);
                $cpanel->pass             = $passSha1;
                $cpanel->pass_noencrypt   = $pass;
                $cpanel->email            = $email;
                $cpanel->carrer           = $carrer;
                $cpanel->active           = $active;
                $cpanel->editUsers();
                if($cpanel->data) {
                    return "<script> toastr.success('Presiona el boton azul para ver los cambios', 'Edicion Realizada');  </script>";
                } else {
                    return "<script> toastr.error('', 'No key');  </script>";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    }

    /**
     * Metodo para eliminar la cuenta y datos del usuario
     * @return string
     */
    function deleteData($d) {
        try {
            deleteDirectory('./assets/uploads/'.$d[0]['id']);
            $cpanel = new cpanelModel();
            $cpanel->id_user = $d[0]['id'];
            $cpanel->id = $d[0]['id'];
            $cpanel->deleteLikes();
            $cpanel->deleteComments();
            $cpanel->deleteArticles();
            $cpanel->deleteUser();
            if($cpanel->data) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    /**
     * Metodo para eliminar folders y archivos
     * @return string
     */
    function deleteDirectory($dir) {
        if(!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
            if($current != '.' && $current != '..') {
                echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
                if (!@unlink($dir.'/'.$current)) 
                    deleteDirectory($dir.'/'.$current);
            }       
        }
        closedir($dh);
        echo 'Se ha borrado el directorio '.$dir.'<br/>';
        @rmdir($dir);
    }
//--------------------------------------------------------------------------------------------------
    /**
     * Metodo para enviar mensaje de contacto
     * @return String
     */

     function sendEmailContact() {
        if(isset($_POST['submitContact'])) {
            try {
                $email = filter($_POST['email']);
                $username = filter($_POST['username']);
                $subject = filter($_POST['subject']);
                $message = filter($_POST['message']);
                SendEmailsContact::send(
                    $username, 
                    $subject, 
                    'Usuario: '.$username.'<br>'.
                    'Correo: '.$email.'<br>'.
                    'Asunto: '.$subject.'<br>'.
                    'Mensaje: '.$message);
                return "
                    <script>
                        toastr.success('', 'Correo Enviado!');
                    </script>";
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
        return "";
     }
    

    function waitMe() {
        if(isset($_POST['submitContact'])) {
            return "
            <script>
                $('body').waitMe({ effect : 'ios' });
            </script>
            ";
        }
        
    }
