<?php
session_start();

$usuario = $_POST['nombre'];
$pass = $_POST['pass'];



include "./conexion.php";

$pass = md5($pass);
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$pass'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas > 0) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['idRole'] = $filas['idRole'];

	$usuariologueado = $_SESSION['usuario'];
	$rollogueado = $_SESSION['idRole'];

	// access session variables
	echo $_SESSION['logged_in_user_id'];
	echo $_SESSION['logged_in_user_name'];
	header("location: ../pagina_principal");
} else {
	header("location: ../errors/error_login");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
