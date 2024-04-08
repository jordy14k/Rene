<?php 
class Conexion{
	//conexion de la base de datos con el sistema 
	private $host='localhost';//nombre del servidor de la base de datos 
	private $usuario='root';//nombre del usurio de la base de datos 
	private $password = '';//contraseña del usuario de la BD
	private $base='gestion';//nombre de la base de datos 
	public $sentencia;
	private $conexion;

		//Abrir la conexion de la base de datos por medio de funciones
	private function abrir_conexion(){
		$this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);
	}
		//Cerrar la conexion de base de datos por medio de funcion
	private function cerrar_conexion(){
		$this->conexion->close();
	}
		//ejecutar un sentencia para poder realizar acciones con el sistema y la  ase de datos
	public function ejecutar_sentencia(){
		$this->abrir_conexion();
		$resultado = $this->conexion->query($this->sentencia);
		$this->cerrar_conexion();
		return $resultado;
	}
		//Obtener sentencia de la base de todos para reliazar acciones en el sistema
	public function obtener_sentencia(){
		$this->abrir_conexion();
		$resultado = $this->conexion->query($this->sentencia);
		return $resultado;
	}

}

 ?>