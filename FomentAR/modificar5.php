<?php include 'nav_externo.php'; ?>
<?php
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion= '') {
	header("location: ./error_nologueado");
	die();
}
$conexion=mysqli_connect("localhost","root","","fomentar");

$consulta=ConsultarCliente($_GET['DNI']);

function ConsultarCliente( $DNI )
{
	$conexion=mysqli_connect("localhost","root","","fomentar");
	$sentencia="SELECT * FROM clientes WHERE DNI='".$DNI."' ";
	$resultado1= $conexion->query($sentencia) or die ("Error al consultar cliente".mysqli_error($conexion)); 
	$fila=mysqli_fetch_assoc($resultado1);

	return [
		$fila['Nombre'],
		$fila['Apellido'],
		$fila['Nro_orden'],
		$fila['Domicilio'],
		$fila['DNI'],
		$fila['Fecha_nacimiento'],
		$fila['Fecha_ingreso'],
		$fila['idParametro_Socio'],

	];
}



?>
<body>
	<div class="contenedor p-1" style="">
		<form action="modificar6.php" method="post">
			<div class="form-group">
				<input type="hidden" name="Usuario"  value="<?php echo $_GET['Nro_orden']?>">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" placeholder="Nombre" name="Nombre" value="<?php echo $consulta[0] ?>" required>
			</div>
			<div class="form-group">
				<label for="apellido">Apellido</label>
				<input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo utf8_encode($consulta[1]) ?>" required>
			</div>
			<div class="form-group">
				<label for="domicilio">Domicilio</label>
				<input type="text" class="form-control" placeholder="Domicilio" name="domicilio" value="<?php echo $consulta[3] ?>" required>
			</div>
			<div class="form-group">
				<label for="user">DNI</label>
				<input type="number" class="form-control" placeholder="DNI" name="DNI" id="cantidad"  value="<?php echo $consulta[4] ?>" required>
			</div>
			<div class="form-group">
				<label for="fecha_nacimiento">Fecha de nacimiento</label>
				<input type="date" name="fecha_nacimiento" max="3000-12-31" 
				min="1000-01-01" class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento" value="<?php echo $consulta[5] ?>"  required >
			</div>
			<div class="form-group">
				<label for="fecha_ingreso">Fecha de ingreso</label>
				<input type="date" name="fecha_ingreso" max="3000-12-31" 
				min="1000-01-01" class="form-control" placeholder="Fecha de ingreso" name="fecha_ingreso" value="<?php echo $consulta[6] ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect">¿Es Socio?</label>
				<select simple class="form-control" id="exampleFormControlSelect" name="socio" required value="<?php echo $consulta[7] ?>">
					<option value="1">Si</option>
					<option value="2">No</option>

				</select>
			</div>
<!-- 			<div class="form-group">
				<label for="exampleFormControlSelect2">Actividad</label>
				<select multiple class="form-control" id="exampleFormControlSelect2" name="" required>
					<option value="basquet">Basquet</option>
					<option value="patin">Patín</option>
					<option value="futbol">Futbol</option>
					<option value="arte">Arte</option>		
					<option value="taekwondo">Taekwondo</option>
					<option value="voley">Voley</option>
				</select>
			</div> -->
			<div class="dropdown-divider"></div>
			<button type="button" class="btn btn-secondary float-right" onclick="history.back()">Cancelar</button>
			<input type="submit" class="btn btn-primary" name="submit" value="Actualizar">
		</form>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
</body>
</html>