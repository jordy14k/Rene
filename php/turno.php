<?php 
	
	require_once("conexion.php");
	class Turno extends Conexion{

		function insertar(){

			$no =$_POST["no"];
			$dirigido =$_POST["dirigido"];
			$remitente =$_POST["remitente"];
			$asunto =$_POST["asunto"];
			$fechaentr =$_POST["fechaentr"];
			$instru =$_POST["instru"];
			$fechares =$_POST["fechares"];
			$estatuus =$_POST["estatuus"];
			$prioridad=$_POST["prioridad"];
			$reporteA=$_POST["reporteA"];
			$observa=$_POST["observa"];
			$imagen ="";
			if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"]!=""){

				$archivo =$_FILES["archivo"]["tmp_name"];
				$destino ="img/".$_FILES["archivo"]["name"];
				$imagen =$_FILES["archivo"]["name"];
				move_uploaded_file($archivo,$destino);
			}
			$this->sentencia = "INSERT INTO turno VALUES (null, '$no','$dirigido','$remitente','$asunto','$fechaentr','$instru','$fechares','$estatuus','$prioridad','$reporteA','$observa','$imagen')";
			$bandera =$this->ejecutar_sentencia();
			if($bandera==True){

				echo"<h2 class='aviso'> Turno Insertado </h2>";
			}	
		}
		function modificar(){

			$no =$_POST["no"];
			$dirigido =$_POST["dirigido"];
			$remitente =$_POST["remitente"];
			$asunto =$_POST["asunto"];
			$fechaentr =$_POST["fechaentr"];
			$instru =$_POST["instru"];
			$fechares =$_POST["fechares"];
			$estatuus =$_POST["estatuus"];
			$prioridad=$_POST["prioridad"];
			$reporteA=$_POST["reporteA"];
			$observa=$_POST["observa"];
			$id =$_POST["id"];
			$imagen ="";
		if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"]!=""){

				$archivo = $_FILES["archivo"]["tmp_name"];
				$destino = "img/".$_FILES["archivo"]["name"];
				$imagen = $_FILES["archivo"]["name"];
				move_uploaded_file($archivo,$destino);

				$this->sentencia ="UPDATE turno SET
				 No='$no',
				 Dirigido='$dirigido',
				 Remitente='$remitente',
				 Asunto='$asunto',
				 fecha_Entr='$fechaentr',
				 Instruccion='$instru',
				 Fecha_Res='$fechares',
				 Estatus='$estatuus',
				 Prioridad='$prioridad',
				 Reporte_Acc='$reporteA',
				 Observaciones='$observa',
				 img='$imagen' WHERE id=$id";
			}else{
				$this->sentencia ="UPDATE turno SET 
				 No='$no',
				 Dirigido='$dirigido',
				 Remitente='$remitente',
				 Asunto='$asunto',
				 fecha_Entr='$fechaentr',
				 Instruccion='$instru',
				 Fecha_Res='$fechares',
				 Estatus='$estatuus',
				 Prioridad='$prioridad',
				 Reporte_Acc='$reporteA',
				 Observaciones='$observa' WHERE id=$id";
			}	
			$bandera =$this->ejecutar_sentencia();
			if($bandera==True){
				echo"<h2 class='aviso'> Turno Modificado </h2>";
			}

		}

		function eliminar(){
			$id = $_POST["id"];
			$this->sentencia ="DELETE FROM turno WHERE id=$id";
			$bandera =$this->ejecutar_sentencia();
			if($bandera==True){
				echo"<h2 class='aviso'> Turno Eliminado </h2>";
			}
		}
		function consultar(){
			$this->sentencia ="SELECT * FROM turno";
			return $this->obtener_sentencia();
		}
		function cargar(){
			$id =$_POST["id"];
			$this->sentencia ="SELECT * FROM turno WHERE id=$id";
			return $this->obtener_sentencia();
		}

		function comboTurno(){
			$this->sentencia = "SELECT * FROM turno";
			$resultado=$this->obtener_sentencia();
			echo "<select name 'turno'>";
			while($fila=$resultado->fetch_assoc()){
				echo "<option value='".$fila["id"]."'>".$fila["no"]."</option>";
			}
			echo "</select>";
		}
		
		
	}
?>

