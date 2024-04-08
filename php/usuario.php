<?php 
require_once("conexion.php");
class Usuario extends Conexion{

	function insertar(){
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		$permiso = $_POST["permiso"];

		
		$this->sentencia = "INSERT INTO usuario VALUES (null,'$usuario','$password','$permiso')";
		$bandera = $this->ejecutar_sentencia();
		if($bandera==True){
			echo "<h2 class='aviso'>Usuario insertado</h2>";
		}
	}

	function modificar(){
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		$permiso = $_POST["permiso"];
		$id = $_POST["id"];
		
		$this->sentencia = "UPDATE usuario SET usuario=
		'$usuario',pass='$password',permiso='$permiso' 
		WHERE id='$id'";
		$bandera = $this->ejecutar_sentencia();
		if($bandera==True){
			echo "<h2 class='aviso'>Usuario modificado</h2>";
		}
	}

	function eliminar(){
		$id = $_POST["id"];
		$this->sentencia="DELETE FROM usuario WHERE id='$id'";
		$bandera = $this->ejecutar_sentencia();
		if($bandera==True){
			echo "<h2 class='aviso'>Usuario eliminado</h2>";
		}	
	}

	function consulta(){
		$this->sentencia = "SELECT * FROM usuario";
		return $this->obtener_sentencia();
	}

	function cargar(){
		$id = $_POST["id"];
		$this->sentencia = "SELECT * FROM usuario WHERE id='$id'";
		return $this->obtener_sentencia();	
	}

	function sesion($usuario,$password){
		$this->sentencia="SELECT * FROM usuario WHERE usuario='$usuario' AND pass='".md5($password)."'";
		$resultado = $this->obtener_sentencia();
		if($resultado->num_rows==0){
			return 0;
		}else{
			$fila = $resultado->fetch_assoc();
			if($fila["usuario"]==$usuario){
				session_start();
				if($fila["permiso"]==1){
					$_SESSION["permiso"] = "ADMIN";
					$_SESSION["nombre"] = "$usuario";
				}else{
					$_SESSION["permiso"] = "USUARIO";
					$_SESSION["nombre"] = "$usuario";
				}
				header("Location: home.php");
			}else{
				return 0;
			}
		}
	}

}
 ?>