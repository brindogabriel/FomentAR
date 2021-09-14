<?php 
  // Si no hubo error, proceder
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];

    // Crear objeto de conexión con la base de datos
$mysqli = new mysqli("localhost","root","","fomentar");

/* Verificar errores de conexion con la BD */
if ($mysqli->connect_error) {
	echo "Connection failed: " . $conn->connect_error;
} 

    // crear cadena de inserción SQL
$sql = "INSERT INTO usuarios (Usuario, Password, idRole) VALUES ('$nombre', '$password','$tipo')";

    // Ejecutar y validar el comando SQL 
if ($mysqli->query($sql) === TRUE) {
	//echo "Nuevo registro creado exitosamente";
} else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}

    $mysqli->close();  // Cerrar conexión

    header("location: ./gestion_usuarios")
    ?>