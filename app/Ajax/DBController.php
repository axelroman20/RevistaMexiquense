<?php
/**
 * Clase que crea una conexion a la base de datos y 
 * maneja las consultas mediente los metodos que se llamen.
 * 
 * NOTA: existe esta segunda conexion ya que el trabajar con
 * ajax la conexion asincrona por lo que se necesita otro medio
 * de conexion.
 */
class DBController {
 	// Parametros para la conexion a la base de datos
	private $host     = "localhost";
	private $database = "u730030579_revistagcm";
	private $user     = "root";
	private $password = "";
	private $conn;
	// Constructor inicializador de funciones
	function __construct() {
		$this->conn = $this->connectDB();
	}
	// Funcion que realiza la conexion a la base de datos
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	// Funcion que prepara la funcion sql
	function query($query) {
		$result = mysqli_query($this->conn, $query);
		return $result;
	}
	// Funcion que realiza una consulta a la base de datos 
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_array($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}
	// Funcion que realiza un ingreso de informacion a la base de datos  
	function insertQuery($query) {
	    mysqli_query($this->conn, $query);
	    $insert_id = mysqli_insert_id($this->conn);
	    return $insert_id;
	}
	// Funcion que realiza una consulta por medio de un id  
	function getIds($query) {
	    $result = mysqli_query($this->conn,$query);
	    while($row=mysqli_fetch_array($result)) {
	        $resultset[] = $row[0];
	    }
	    if(!empty($resultset))
	        return $resultset;
	}
	// Funcion que realiza una consulta a la base de datos  
	function numRows($query) {
		$result  = mysqli_query($this->conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}