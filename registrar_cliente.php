<?php 
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$domicilio = $_POST["domicilio"];
$dni = $_POST["dni"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$fecha_ingreso = $_POST["fecha_ingreso"];
$socio = $_POST["socio"];
$estado = $_POST["estado"];
$sexo = $_POST["sexo"];
$actividades = $_POST["actividades"];
//$actividades = $_POST["actividades"];
$Edad = strtotime ($fecha_ingreso) - strtotime ($fecha_nacimiento);
$diferencia_anios = intval($Edad/60/60/24/365.25);


if ($actividades == "basquet" & $sexo = 3 & $diferencia_anios <= 6 || $diferencia_anios >=10 ) {
	$idCategoria = 1;
} 

    // Crear objeto de conexión con la base de datos
$mysqli = new mysqli("localhost","root","","fomentar");

/* Verificar errores de conexion con la BD */
if ($mysqli->connect_error) {
	echo "Connection failed: " . $conn->connect_error;
} 

    // crear cadena de inserción SQL
$sql= "INSERT INTO clientes(Nombre,Apellido,Domicilio,DNI,Fecha_nacimiento,Fecha_ingreso,idParametro_Socio,idEstado,idSexo,idCategoria) VALUES ('$nombre','$apellido','$domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$estado','$sexo', '$idCategoria')";

    // Ejecutar y validar el comando SQL 
if ($mysqli->query($sql) === TRUE) {
	echo "Nuevo registro creado exitosamente";
} else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}


$sqlNro_orden= "SELECT Nro_orden FROM clientes WHERE DNI = $dni LIMIT 1";
$resultado = mysqli_query($mysqli, $sqlNro_orden);
$coso = mysqli_fetch_array($resultado);
$Nro_orden = $coso['Nro_orden'];

$sql2 = "INSERT INTO actividades(Nro_orden, idDisciplina) VALUES ('$Nro_orden', '$idCategoria')";
if ($mysqli->query($sql2) === TRUE) {
	//echo "Nuevo registro creado exitosamente";
} else {
	echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}



$mysqli->close();  // Cerrar conexión

/*echo "<script>history.go(-1);</script>"; */
?>


<!-- 
1) cuando el usuario te ingrese el sexo en la pagina, vos vas a tener el valor 
"Masculino", "Femenino" o "Mixto"

vas a guardar en una variable, lo que te trae la siguiente consulta

Select idSexo From Sexo Where Detalle = Variable en donde el usuario cargo el sexo
en la pagina

2) Buscar el idCategoria

Select idCategoria From Categorias where idSexo = "Variable que tiene el idSexo buscado arriba"
and "Variable que calculo la edad del cliente" Between Edad_Inicial and Edad_Final

Ejemplo: Edad del cliente es 5 años y sexo es mixto (idSexo = 3)

SELECT idCategoria FROM `categorias` WHERE idSexo = 3 and 5 BETWEEN Edad_Inicial and Edad_Final

-->