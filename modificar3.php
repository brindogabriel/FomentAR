<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion= '') {
	header("location: ./error_nologueado");
	die();
}
$conexion=mysqli_connect("localhost","root","","fomentar");

$consulta=ConsultarProducto($_GET['id']);

function ConsultarProducto( $id )
{
	$conexion=mysqli_connect("localhost","root","","fomentar");
	$sentencia="SELECT * FROM usuarios WHERE id='".$id."' ";
	$resultado= $conexion->query($sentencia) or die ("Error al consultar producto".mysqli_error($conexion)); 
	$fila=$resultado->fetch_assoc();

	return [
		$fila['usuario'],
		$fila['password'],
		$fila['tipo'],
	];
}
?>
<?php include 'nav_externo.php'; ?>
<body>
	<div class="form-login">
		<form action="modificar4.php" method="post">
			<div class="form-group">
				<input type="hidden" name="tipo"  value="<?php echo $_GET['tipo']?>">
				<label for="user">Usuario</label>
				<input type="text" class="form-control" placeholder="Usuario" name="nombre" value="<?php echo $consulta[0] ?>">
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<div class="input-group-text">
						<input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña">
					</div>
				</div>
				<input type="password" class="form-control" id="myInput" placeholder="Contraseña" name="password" value="<?php echo $consulta[1] ?>">
			</div>
			<div class="form-group">
				<select name="cbx_estado" id="cbx_estado"  class="form-control">
					<option value="0">Tipo de usuario</option>
					<?php
					$conexion=mysqli_connect("localhost","root","","fomentar");
					$consulta="SELECT id, tipo FROM `usuarios`";
					$resultado=mysqli_query($conexion,$consulta);
					while($row = $resultado->fetch_assoc()) { ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
					<?php } ?>
				</select>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
		</form>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</body>
</html>