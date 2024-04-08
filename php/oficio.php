	<?php
	require_once("conexion.php");
	class Oficio extends Conexion{

		//codigo de las bariables recibidas de cada caja del sistema para guardarla en la base de datos 
	function insertar(){

		$numeropro = $_POST["numeropro"];
		$numeroofi = $_POST["numeroofi"];
		$instanciaR = $_POST["instanciaR"];
		$asunto = $_POST["asunto"];
		$fechare = $_POST["fechare"];
		$reponsableA = $_POST["reponsableA"];
		$firma = $_POST["firma"];
		$solic = $_POST["solic"];
		$tema = $_POST["tema"];
		$tipore = $_POST["tipore"];
		$fechaTe = $_POST["fechaTe"];
		$turnadoA = $_POST["turnadoA"];
		$imagen = "";
		if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"]!=""){
			$archivo = $_FILES["archivo"]["tmp_name"];
			$destino = "img/".$_FILES["archivo"]["name"];
			$imagen = $_FILES["archivo"]["name"];
			move_uploaded_file($archivo, $destino);
		}//para poder agregar imagenes a la base de datos 
		$this->sentencia = "INSERT INTO oficio VALUES (null,'$numeropro','$numeroofi','$instanciaR','$asunto','$fechare','$reponsableA','$firma','$solic','$tema','$tipore','$fechaTe','$turnadoA','$imagen')";
		$bandera = $this->ejecutar_sentencia();
		if($bandera==True){
			echo "<h2 class='aviso'> Oficio Insertado</h2>";
		}//insertar los datos de la base de datos 
	}
	 function modificar(){

	 	$numeropro = $_POST["numeropro"];
		$numeroofi = $_POST["numeroofi"];
		$instanciaR = $_POST["instanciaR"];
		$asunto = $_POST["asunto"];
		$fechare = $_POST["fechare"];
		$reponsableA = $_POST["reponsableA"];
		$firma = $_POST["firma"];
		$solic = $_POST["solic"];
		$tema = $_POST["tema"];
		$tipore = $_POST["tipore"];
		$fechaTe = $_POST["fechaTe"];
		$turnadoA = $_POST["turnadoA"];
		$id =$_POST["id"];
		$imagen ="";

		if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"]!=""){
			$archivo = $_FILES["archivo"]["tmp_name"];
			$destino = "img/".$_FILES["archivo"]["name"];
			$imagen = $_FILES["archivo"]["name"];
			move_uploaded_file($archivo, $destino);

			$this->sentencia = "UPDATE oficio SET 
			 N_P='$numeropro',
			 No_Oficio='$numeroofi', 
			 Intancia_Re='$instanciaR', 
			 Asunto='$asunto', 
			 Fecha_Re='$fechare', 
			 Responsable_At='$reponsableA', 
			 Firma='$firma', 
			 Solicitante='$solic', 
			 Tema='$tema',
			 Tipo_Rec='$tipore', 
			 Fecha_T='$fechaTe', 
			 Turnado_A='$turnadoA',
			  img='$imagen' WHERE id ='$id'";
		}else{

			$this->sentencia = "UPDATE oficio SET 
			N_P='$numeropro', 
			No_Oficio='$numeroofi',
			Intancia_Re='$instanciaR',
			Asunto='$asunto',
			Fecha_Re='$fechare',
			Responsable_At='$reponsableA',
			Firma='$firma',
			Solicitante='$solic',
			Tema='$tema',
			Tipo_Rec='$tipore',
			Fecha_T='$fechaTe',
			Turnado_A='$turnadoA' WHERE id ='$id'";
		}
		$bandera = $this->ejecutar_sentencia();
		if($bandera==True){
			echo "<h2 class='aviso'> Oficio Modificado</h2>";
		}
	 }
	 function eliminar(){
	 	$id =$_POST["id"];
	 	$this->sentencia = "DELETE FROM oficio WHERE id='$id'";
	 	$bandera =$this->ejecutar_sentencia();
	 	if($bandera==True){
	 		echo "<h2 class='aviso'> Oficio Eliminado </h2>";
	 	}
	 }
	 function consultar(){
	 	$this->sentencia ="SELECT * FROM oficio";
	 	return $this->obtener_sentencia();
	 }
	 function cargar(){
	 	$id =$_POST["id"];
	 	$this->sentencia ="SELECT * FROM oficio WHERE id=$id";
	 	return $this->obtener_sentencia();
	 }

	  function combooficio(){
	  	$this->sentencia = "SELECT * FROM oficio";
	  	$resultado = $this->obtener_sentencia();
	  	echo "<select name='oficio'>";
	  	while($fila = $resultado->fetch_assoc()){
	  		echo "<option value ='".$fila["id"]."'>".$fila["numeroofi"]."</option>";
	  	}
	  	echo "</select>";
	  }

	}


	?>