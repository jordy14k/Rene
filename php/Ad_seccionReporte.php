<article id="principal">
		
		<?php 
		require_once("oficio.php");
		$obj = new oficio();
			if(isset($_POST["cargar"])){
			$res =$obj->cargar();
			$fila =$res->fetch_assoc();
		
		?>
		<script type="text/javascript">
		function confirmodific()
		{
			var respuesta =confirm("Esta seguro que desea Modificar el Oficio?");
			if(respuesta==true){
				return true;
			}
			else{

				return false;
		}
			}
	</script>
	<script type="text/javascript">
		function confirmeliminar()
		{
			var respuesta =confirm("Esta seguro que desea Eliminar el Oficio?");
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
			<legend>Modificar Oficio</legend>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" required>

				Número Progresivo:
				<input type="number"  name="numeropro" value="<?php echo $fila['N_P']; ?>" required><br> 
				Número de Oficio:
				<input type="text" name="numeroofi" value="<?php echo $fila['No_Oficio']; ?>" required><br>
				Instacia que Remite:
				<input type="text" name="instanciaR" value="<?php echo $fila['Intancia_Re']; ?>" required><br> 
				Asunto:
				<input type="text" name="asunto" value="<?php echo $fila['Asunto']; ?>" required><br> 
				Fecha de Recepción:
				<input type="date"  min="2022-10-13" max="2026-01-01" name="fechare" value="<?php echo $fila['Fecha_Re']; ?>" required><br> 
				Responsable de Atención:
				<input type="text" name="reponsableA" value="<?php echo $fila['Responsable_At']; ?>" required><br> 
				Firma:
				<input type="text" name="firma" value="<?php echo $fila['Firma']; ?>" required><br> 
				Solicitante:
				<input type="text" name="solic" value="<?php echo $fila['Solicitante']; ?>" required><br> 
				Tema:
				<input type="text" name="tema" value="<?php echo $fila['Tema']; ?>" required><br> 
				Tipo de Recepción:
				<input type="text" name="tipore" value="<?php echo $fila['Tipo_Rec']; ?>" required><br> 
				Fecha de Turno:
				<input type="date" min="2022-10-13" max="2026-01-01" name="fechaTe" value="<?php echo $fila['Fecha_T']; ?>" required><br> 
				Turnado A:
				<input type="text" name="turnadoA" value="<?php echo $fila['Turnado_A']; ?>" required><br> 
				Imágen:
				<input type="file" name="archivo" ><br> 
				<input type="submit" name="modificar" value="Modificar oficio" onclick= "return confirmodific()" >
				<input type="submit" name="eliminar" value="Eliminar oficio" onclick="return confirmeliminar()" >
				<input type="submit" name="Cancelar" value="Cancelar" onclick="return confircancelar()">	

			</form>
		</fieldset>
		<?php }else{
	 	?>
	 	<script type="text/javascript">
		function confireport(){

			var respuesta=confirm("Esta seguro de los datos ingresados");
			if(respuesta==true){
				return true;
			}else{
				return false;
			}
		}
	</script>

			<fieldset>
				<legend>Inserta Oficio</legend>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" required>

				Número Progresivo:
				<input type="number"  name="numeropro"  required><br> 
				Número de Oficio:
				<input type="text" name="numeroofi"  required><br>
				Instacia que Remite:
				<input type="text" name="instanciaR" required><br> 
				Asunto:
				<input type="text"  name="asunto"  required><br> 
				Fecha de Recepción:
				<input type="date" min="2022-10-13" max="2026-01-01" name="fechare" required><br> 
				Responsable de Atención:
				<input type="text"  name="reponsableA"  required><br> 
				Firma:
				<input type="text" name="firma"  required><br> 
				Solicitante:
				<input type="text" name="solic"  required><br> 
				Tema:
				<input type="text" name="tema" required><br> 
				Tipo de Recepción:
				<input type="text" name="tipore" required><br> 
				Fecha de Turno:
				<input type="date" min="2022-10-13" max="2026-01-01" name="fechaTe" required><br> 
				Turnado A:
				<input type="text" name="turnadoA" required><br> 
				Imágen:
				<input type="file" name="archivo" ><br> 
				<input type="submit" name="insertar" value="Insertar oficio" onclick="return confireport()">

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
					<th>Número Progresivo</th>
					<th>Número de Oficio</th>
					<th>Instacia que Remite</th>
					<th>Asunto</th>
					<th>Fecha de Recepción</th>
					<th>Responsable de Atención</th>
					<th>Firma</th>
					<th>Solicitante</th>
					<th>Tema</th>
					<th>Tipo de Recepción</th>
					<th>Fecha de Turno</th>
					<th>Turnado A</th>
					<th>Imágen</th>
					<th>Opciones</th>
				</tr>
				<?php 
	  			$res = $obj->consultar();
	  			while($fila = $res->fetch_assoc()){
						echo "<tr>";
						echo "<td>".$fila["N_P"]."</td>";
						echo "<td>".$fila["No_Oficio"]."</td>";
						echo "<td>".$fila["Intancia_Re"]."</td>";
						echo "<td>".$fila["Asunto"]."</td>";
						echo "<td>".$fila["Fecha_Re"]."</td>";
						echo "<td>".$fila["Responsable_At"]."</td>";
						echo "<td>".$fila["Firma"]."</td>";
						echo "<td>".$fila["Solicitante"]."</td>";
						echo "<td>".$fila["Tema"]."</td>";
						echo "<td>".$fila["Tipo_Rec"]."</td>";
						echo "<td>".$fila["Fecha_T"]."</td>";
						echo "<td>".$fila["Turnado_A"]."</td>";
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