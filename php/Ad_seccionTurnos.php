<article id="principal">
	<?php 
	require_once("turno.php");
	$obj = new turno();
		if(isset($_POST["cargar"])){
			$res =$obj->cargar();
			$fila =$res->fetch_assoc();
		
	?>
	<script type="text/javascript">
		function confirmodificar()
		{
			var respuesta =confirm("Esta seguro que desea Modificar el turno?");
			if(respuesta==true){
				return true;
			}
			else{

				return false;
		}
			}
	</script>
	<script type="text/javascript">
		function confirmDelete()
		{
			var respuesta =confirm("Esta seguro que desea Eliminar el turno?");
			if(respuesta==true){
				return true;
			}
			else{

				return false;
		}
			}
	</script>
	<script type="text/javascript">
		function confircancelar()
		{
			var respuesta =confirm("Cancelar operacion");
			if(respuesta==true){
				return true;
			}
			else{

				return false;
		}
			}
	</script>


	
	


	<fieldset>
		<legend>Modificar Turno</legend>
		<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" required>

		Número:
		<input type="number"pattern="[0-9()+]{5,5}" name="no" value="<?php echo $fila['No']; ?>" required><br> 

		Dirigido:
		<input type="text" name="dirigido" value="<?php echo $fila['Dirigido']; ?>" required><br>

		Remitente:
		<input type="text" name="remitente" value="<?php echo $fila['Remitente']; ?>" required><br> 
		Asunto:
		<input type="text" name="asunto" value="<?php echo $fila['Asunto']; ?>" required><br> 
		Fecha de Entrega:
		<input type="date" min="2022-10-13" max="2026-01-01" name="fechaentr" value="<?php echo $fila['fecha_Entr']; ?>" required><br> 
		Instrucción:
		<input type="text" name="instru" value="<?php echo $fila['Instruccion']; ?>" required><br> 
		Fecha de Respuesta:
		<input type="text" min="2022-10-13" max="2026-01-01" name="fechares" value="<?php echo $fila['Fecha_Res']; ?>" required><br> 
		Estatus:
		<input type="text" name="estatuus" value="<?php echo $fila['Estatus']; ?>" required><br> 
		Prioridad:
		<input name="pr" type="text" name="prioridad" value="<?php echo $fila['Prioridad']; ?>" required><br> 
		Reporte de Acciones Realizadas:
		<input type="text" name="reporteA" value="<?php echo $fila['Reporte_Acc']; ?>" required><br> 
		Observaciones:
		<input type="text" name="observa" value="<?php echo $fila['Observaciones']; ?>" required><br> 
				 
		Imágen:
		<input type="file" name="archivo" ><br> 
		<input type="submit" name="modificar" value="Modificar Turno" onclick="return confirmodificar()" >

			

			
			<input type="submit" name="eliminar" value="Eliminar Turno" onclick="return confirmDelete()" >
		



		



		<input type="submit" name="Cancelar" value="Cancelar" onclick="return confircancelar()">	

		</form>
	</fieldset>
	<?php }else{
	?>

<script type="text/javascript">
		function confirinsert(){

			var respuesta=confirm("Esta seguro de los datos ingresados");
			if(respuesta==true){
				return true;
			}else{
				return false;
			}
		}
	</script>

<fieldset>
	<legend>Insertar Turno</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" required>
		
				Número:
				<input type="number" pattern="[0-9()+]{5,5}" name="no" required><br> 
				Dirigido:
				<input type="text" name="dirigido" required><br>
				Remitente:
				<input type="text" name="remitente" required><br> 
				Asunto:
				<input type="text" name="asunto" required><br> 
				Fecha de Entrega:
				<input type="date" min="2022-10-13" max="2026-01-01" name="fechaentr" required><br> 
				Instrucción:
				<input type="text" name="instru"  required><br> 
				Fecha de Respuesta:
				<input type="date" min="2022-10-13" max="2026-01-01" name="fechares"  required><br> 
				Estatus:
				<input type="text" name="estatuus" required><br> 
				Prioridad:
				<input type="text" name="prioridad" required><br> 
				Reporte de Acciones Realizadas:
				<input type="text" name="reporteA"  required><br> 
				Observaciones:
				<input type="text" name="observa" required><br> 
				Imágen:
				<input type="file" name="archivo" ><br> 
				<input type="submit" name="insertar" value="Insertar Turno" onclick="return confirinsert()">
</form>

</fieldset>
	<?php 
}
if(isset($_POST["modificar"])){
	$obj->modificar();
}
if(isset($_POST["eliminar"])){
	$obj->eliminar();
}
if(isset($_POST["insertar"])){
	$obj->insertar();
}
if(isset($_POST["cargar"])){
	$obj->cargar();
}

?>
	<article id="tabla">
		
		<table>
			<tr>
				<th>Número</th>
				<th>Dirigido</th>
				<th>Remitente</th>
				<th>Asunto</th>
				<th>Fecha de Entrega</th>
				<th>Instrucción</th>
				<th>Fecha de Respuesta</th>
				<th>Estatus</th>
				<th>Prioridad</th>
				<th>Reporte de Acciones Realizadas</th>
				<th>Observaciones</th>
				<th>Imágen</th>
				<th>Opciones</th>
			</tr>
			
			<?php

				$res = $obj->consultar();
				while($fila = $res->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$fila["No"]."</td>";
					echo "<td>".$fila["Dirigido"]."</td>";
					echo "<td>".$fila["Remitente"]."</td>";
					echo "<td>".$fila["Asunto"]."</td>";
					echo "<td>".$fila["fecha_Entr"]."</td>";
					echo "<td>".$fila["Instruccion"]."</td>";
					echo "<td>".$fila["Fecha_Res"]."</td>";
					echo "<td>".$fila["Estatus"]."</td>";
					echo "<td>".$fila["Prioridad"]."</td>";
					echo "<td>".$fila["Reporte_Acc"]."</td>";
					echo "<td>".$fila["Observaciones"]."</td>";
				if($fila["img"]!=""){
	  					echo "<td><img src='img/".$fila["img"]."' /></td>";
						}else{
							echo "<td></td>";
						}
						echo "<td>
						<form action='' method='post'>	
							<input type='hidden' value='".$fila["id"]."' name='id'>
							<input type='hidden' name='cargar' value='1'>
	  					    <input type='image' src='img/update.jpg'>

								
							</form>
							</td>";
							echo "</tr>";	
					}
					?>				
		</table>
		
	</article>		

</article>