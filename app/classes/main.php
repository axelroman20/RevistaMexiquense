<?php 
/**
 * Clase principal que se encarga de ir inicializando y
 * cargando todos los archivos de forma automatica para 
 * que pueda funcionar el proyecto de forma correcta.
 */
class Main {

  // Propiedades iniciales del proyecto 
  private $framework = 'RevistaGCM';
  private $verion = '1.0.0';
  private $uri = [];

  /**
   * El constructor inicializa el metodo init que ejecuta los
   * demas metodos primarios del proyecto.
   * 
   * @return void
   */
  function __construct() {
    $this->init();
  }

  /**
   * Inicia todos los metodos necesarios para el funcionamiento.
   *
   * @return void
   */
  private function init() {
    // Todos los métodos que queremos ejecutar consecutivamente.
    $this->init_session();
    $this->init_load_config();
    $this->init_load_functions();
    $this->init_autoload();
    $this->init_csrf();
    $this->dispatch();
  }

  /**
   * Inicia la session del proyecto.
   * 
   * @return void
   */
  private function init_session() {
    if(session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    return;
  }

  /**
   * Carga el archivo de configuracion del proyecto.
   *
   * @return void
   */ 
  private function init_load_config() {
    $file = 'config.php';
    if(!is_file('app/config/'.$file)) {
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // Cargando el archivo de configuración
    require_once 'app/config/'.$file;

    return;
  }

  /**
   * Cargar todas las funciones del sistema (core.php) y del usuario (custom.php).
   *
   * @return void
   */
  private function init_load_functions() {
    $file = 'core.php';
    if(!is_file(FUNCTIONS.$file)) {
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // Cargando el archivo de funciones core [Principal]
    require_once FUNCTIONS.$file;

    $file = 'custom.php';
    if(!is_file(FUNCTIONS.$file)) {
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // Cargando el archivo de funciones custom [Segundarios]
    require_once FUNCTIONS.$file;

    return;
  }

  /**
   * Metodo que ejecuta el autoloader que requiere todos los
   * archivos necesarios del proyecto de forma automatica
   * tanto los existentes como los nuevos que se creen.
   *
   * @return void
   */
  private function init_autoload() {
    require_once CLASSES.'autoloader.php';
    Autoloader::init();
    return;
  }

  /**
   * Crear un nuevo token de la sesión del usuario
   *
   * @return void
   */
  private function init_csrf() {
    $csrf = new Csrf();
  }

  /**
   * Filtra y descompone los elementos de nuestra url y uri
   * para obtener una url mas amigable para el usuario
   *
   * @return string
   */
  private function filter_url() {
    // Revisa si existe la variable uri en la url
    if(isset($_GET['uri'])) {
      // Obtiene la variable uri de la url
      $this->uri = $_GET['uri'];
      // Se elimina de la uri el caracter '/'
      $this->uri = rtrim($this->uri, '/');
      // Filtra la variable uri de que venga con caracteres especiales
      $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
      // Cambia a miniscula el contenido de la variable uri y la divide mediante los '/'
      $this->uri = explode('/', strtolower($this->uri));
      return $this->uri;
    }
  }

  /**
   * Es el motor de la pagina, aqui es donde se hace la obtenecion y el control de
   * las clases y metodos que el usuario va requiriendo.
   *
   * @return void
   */
  private function dispatch() {

    // Filtrar la URL y separar la URI
    $this->filter_url();

    /////////////////////////////////////////////////////////////////////////////////
    // Necesitamos saber si se está pasando el nombre de un controlador en nuestro URI
    // $this->uri[0] es el controlador en cuestión
    if(isset($this->uri[0])) {
      $current_controller = $this->uri[0]; // users Controller.php
      unset($this->uri[0]);
    } else {
      $current_controller = DEFAULT_CONTROLLER; // home Controler.php
    }

    // Ejecución del controlador
    // Verificamos si existe una clase con el controlador solicitado
    $controller = $current_controller.'Controller'; // homeController
    if(!class_exists($controller)) {
      $current_controller = DEFAULT_ERROR_CONTROLLER; // Para que el CONTROLLER sea error
      $controller = DEFAULT_ERROR_CONTROLLER.'Controller'; // errorController
    }

    /////////////////////////////////////////////////////////////////////////////////
    // Ejecución del método solicitado
    if(isset($this->uri[1])) {
      $method = str_replace('-', '_', $this->uri[1]);
      
      // Existe o no el método dentro de la clase a ejecutar (controllador)
      if(!method_exists($controller, $method)) {
        $controller         = DEFAULT_ERROR_CONTROLLER.'Controller'; // errorController
        $current_method     = DEFAULT_METHOD; // index
        $current_controller = DEFAULT_ERROR_CONTROLLER;
      } else {
        $current_method = $method;
      }

      unset($this->uri[1]);
    } else {
      $current_method = DEFAULT_METHOD; // index
    }

    /////////////////////////////////////////////////////////////////////////////////
    // Creando constantes para utilizar más adelante
    define('CONTROLLER', $current_controller);
    define('METHOD'    , $current_method);

    /////////////////////////////////////////////////////////////////////////////////
    // Ejecutando controlador y método según se haga la petición
    $controller = new $controller;

    // Obteniendo los parametros de la URI
    $params = array_values(empty($this->uri) ? [] : $this->uri);

    // Llamada al método que solicita el usuario en curso
    if(empty($params)) {
      call_user_func([$controller, $current_method]);
    } else {
      call_user_func_array([$controller, $current_method], $params);
    }
     
    return; // Línea final todo sucede entre esta línea y el comienzo
  }

  /**
   * Instancia la clase main para poner a funcionar el proyecto.
   *
   * @return void
   */
  public static function start() {
    $main = new self();
    return;
  }
}