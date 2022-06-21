<?php 
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$domicilio = $_POST["domicilio"];
$dni = $_POST["DNI"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$fecha_ingreso = $_POST["fecha_ingreso"];
$socio = $_POST["socio"];
$estado = 1;
$sexo = $_POST["Sexo"];
$actividades = "taekwondo";

$Edad = strtotime ($fecha_ingreso) - strtotime ($fecha_nacimiento);
$diferencia_anios = intval($Edad/60/60/24/365.25);

if ($sexo == "1" && $diferencia_anios >= 6 && $diferencia_anios <=12 ) {
    $idCategoria = 16;
} 
elseif ($sexo == "2" && $diferencia_anios >= 6 && $diferencia_anios <=12 ) {
    $idCategoria = 16;
} 
elseif ($sexo == "3" && $diferencia_anios >= 6 && $diferencia_anios <=12 ) {
    $idCategoria = 16;
} 
elseif ($sexo == "1" && $diferencia_anios >= 13 && $diferencia_anios <=60 ) {
    $idCategoria = 17;
} 
elseif ($sexo == "2" && $diferencia_anios >= 13 && $diferencia_anios <=60 ) {
    $idCategoria = 17;
} 
elseif ($sexo == "3" && $diferencia_anios >= 13 && $diferencia_anios <=60 ) {
    $idCategoria = 17;
} 

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
  //  echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}



$mysqli->close();  // Cerrar conexión

echo "<script>history.go(-1);</script>"; 
?>