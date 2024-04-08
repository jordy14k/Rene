<article id="principal">
	<?php 
	require_once("usuario.php");
	$obj = new usuario();
	if(isset($_POST["cargar"])){
		$res =$obj->cargar();
		$fila =$res->fetch_assoc();
		?>

		<script type="text/javascript">
		function confirusuario()
		{
			var respuesta =confirm("Esta seguro que desea Modificar el Usuario?");
			if(respuesta==true){
				return true;
			}
			else{

				return false;
		}
			}
	</script>
	<script type="text/javascript">
		function confirmDeleusur()
		{
			var respuesta =confirm("Esta seguro que desea Eliminar el Usuario?");
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
			<legend>Modificar Usuarios</legend>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
				Usuario:
				<input type="text" name="usuario" value="<?php echo $fila['usuario']; ?>" required><br>
				Password:
				<input type="Password" name="password" value="<?php echo $fila ['pass']; ?>"required><br>
				Permiso:
				<input type="Password" name="permiso" value="<?php echo $fila ['permiso']; ?>"required><br>
				
				<input type="submit" name="modificar" value="Modificar Usuario" onclick="return confirusuario()">
				<input type="submit" name="eliminar" value="Eliminar Usuario" onclick="return confirmDeleusur()">
				<input type="submit" name="Cancelar" value="Cancelar" onclick="return confircancelar()">
			</form>
		</fieldset>
	<?php }else{
		?>
		<script type="text/javascript">
			function confirinser(){
				var respuesta =confirm("Cancelar operacion");
				if(respuesta==true){
					return true;
				}else{
					return false;
				}

			}
		</script>


		<fieldset>
			<legend>Insertar Usuario</legend>
			<form action="" method="post" enctype="multipart/form-data">
				Usuario:
				<input type="text" name="usuario"  required><br>
				Password:
				<input type="Password" name="password" required><br>
				Permiso:
				<input type="number" name="permiso" required><br>
				
				<input type="submit" name="insertar" value="Insertar Usuario" onclick="return confirinser()">
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
					<th>Usuario</th>
					<th>Password</th>
					<th>Permiso</th>
					<th>Opciones</th>

				</tr>
				<?php 
				$res =$obj->consulta();
				while($fila =$res->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$fila["usuario"]."</td>";
					echo "<td>".$fila["pass"]."</td>";
					echo "<td>".$fila["permiso"]."</td>";				

					

					echo "<td>
					<form action='' method='post'>
						<input type='hidden' value='".$fila["id"]."' name='id'>
						<input type='hidden' name='cargar' value='1'>
	  					<input type='image' src='img/update.jpg'>

							</form>
							</td>";
							echo  "<tr>";

				}	
				?>
			</table>
		</article>
	
</article>