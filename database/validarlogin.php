<?php
session_start();

$usuario = $_POST['nombre'];
$password = $_POST['password'];
$_SESSION['usuario'] = $usuario;

$conexion=mysqli_connect("localhost","root","","fomentar");

$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";

$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);

if ($filas>0) {
	header("location: ../pagina_principal");
} else {
	header("location: ../errors/error_login");

}
mysqli_free_result($resultado);
mysqli_close($conexion);