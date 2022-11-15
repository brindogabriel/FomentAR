<?php
//* TRAER DATOS DEL FRONT
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$domicilio = $_POST["domicilio"];
$dni = $_POST["DNI"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
//$fecha_ingreso = date("Y-m-d");
$fecha_ingreso = $_POST["fecha_ingreso"];

$socio = $_POST["socio"];
$estado = 1;
$sexo = $_POST["Sexo"];
$actividades = "basquet";
//* CALCULAR EDAD
$Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
$diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);
//* CALCULAR IDCATEGORIA SEGUN EDAD Y SEXO
//* CATEGORIA PRE-MINI-BASQ-MIXTO */
if ($sexo == "1" && $diferencia_anios >= 6 && $diferencia_anios <= 10) {
    $idCategoria = 1;
} elseif ($sexo == "2" && $diferencia_anios >= 6 && $diferencia_anios <= 10) {
    $idCategoria = 1;
}
//* CATEGORIA PRE-MINI-BASQ-MIXTO */
//* CATEGORIA MINI-BASQ-MIXTO */
elseif ($sexo == "1" && $diferencia_anios >= 11 && $diferencia_anios <= 12) {
    $idCategoria = 2;
} elseif ($sexo == "2" && $diferencia_anios >= 11 && $diferencia_anios <= 12) {
    $idCategoria = 2;
}
//* CATEGORIA MINI-BASQ-MIXTO */
//* CATEGORIA SUB-15-FEM */
elseif ($sexo == "1" && $diferencia_anios >= 13 && $diferencia_anios <= 17) {
    $idCategoria = 3;
}
//* CATEGORIA SUB-15-MASC */
elseif ($sexo == "2" && $diferencia_anios >= 13 && $diferencia_anios <= 15) {
    $idCategoria = 4;
}
//* CATEGORIA SUB-15-MASC */
//* CATEGORIA SUB-17-MASC */
elseif ($sexo == "2" && $diferencia_anios >= 16 && $diferencia_anios <= 19) {
    $idCategoria = 5;
}
//* CATEGORIA SUB-17-MASC */
//* CATEGORIA PRIMERA-FEM-BASQ */
elseif ($sexo == "1" && $diferencia_anios >= 18 && $diferencia_anios <= 45) {
    $idCategoria = 6;
}
//* CATEGORIA PRIMERA-FEM-BASQ */
//* CATEGORIA PRIMERA-MASC-BASQ */
elseif ($sexo == "2" && $diferencia_anios >= 20 && $diferencia_anios <= 45) {
    $idCategoria = 7;
}
//* CATEGORIA PRIMERA-MASC-BASQ */
//* INSERTAR REGISTRO EN LA BASE DE DATOS */
$mysqli = new mysqli("localhost", "root", "", "fomentar");
//* Verificar errores de conexion con la BD
if ($mysqli->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}
$sql = "INSERT INTO clientes(Nombre,Apellido,Domicilio,DNI,Fecha_nacimiento,Fecha_ingreso,idParametro_Socio,idEstado,idSexo,idCategoria) VALUES ('$nombre','$apellido','$domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$estado','$sexo', '$idCategoria')";

// Ejecutar y validar el comando SQL
if ($mysqli->query($sql) === true) {
    //echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$nro_orden = "SELECT nro_orden FROM clientes WHERE DNI = $dni LIMIT 1";
$resultado = mysqli_query($mysqli, $nro_orden);
$coso = mysqli_fetch_array($resultado);
$nro_orden = $coso['nro_orden'];

$sql2 = "INSERT INTO actividades(nro_orden, idDisciplina) VALUES ('$nro_orden', 'egor$idCatia')";
if ($mysqli->query($sql2) === true) {
    //echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}

$mysqli->close(); // Cerrar conexión

echo "<script>history.go(-1);</script>";
