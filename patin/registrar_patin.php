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
$actividades = "patin";

$Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
$diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);

//* ESCUELITA PATIN //
if ($sexo == "1" && $diferencia_anios >= 3 && $diferencia_anios <= 45) {
    $idCategoria = 15;
} elseif ($sexo == "2" && $diferencia_anios >= 3 && $diferencia_anios <= 45) {
    $idCategoria = 15;
}
//* ESCUELITA PATIN //
//* INTERMEDIO PATIN //
elseif ($sexo == "1" && $diferencia_anios >= 3 && $diferencia_anios <= 45) {
    $idCategoria = 13;
} elseif ($sexo == "2" && $diferencia_anios >=  3 && $diferencia_anios <= 45) {
    $idCategoria = 13;
}
//* INTERMEDIO PATIN //
//* AVANZADO PATIN //
elseif ($sexo == "1" && $diferencia_anios >=  3 && $diferencia_anios <= 45) {
    $idCategoria = 14;
} elseif ($sexo == "2" && $diferencia_anios >= 3  && $diferencia_anios <= 45) {
    $idCategoria = 14;
}
//* AVANZADO PATIN //
//* SEGUNDO GRUPO PATIN //
elseif ($sexo == "1" && $diferencia_anios >=  3 && $diferencia_anios <= 45) {
    $idCategoria = 12;
} elseif ($sexo == "2" && $diferencia_anios > 33 && $diferencia_anios <= 45) {
    $idCategoria = 12;
}
//* PRIMER GRUPO PATIN //
elseif ($sexo == "1" && $diferencia_anios >= 3 && $diferencia_anios <= 45) {
    $idCategoria = 11;
} elseif ($sexo == "2" && $diferencia_anios >= 3 && $diferencia_anios <= 45) {
    $idCategoria = 11;
}
//* PRIMER GRUPO PATIN //

$mysqli = new mysqli("localhost", "root", "", "fomentar");

/* Verificar errores de conexion con la BD */
if ($mysqli->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}

// crear cadena de inserción SQL
$sql = "INSERT INTO clientes(Nombre,Apellido,Domicilio,DNI,Fecha_nacimiento,Fecha_ingreso,idParametro_Socio,idEstado,idSexo,idCategoria) VALUES ('$nombre','$apellido','$domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$estado','$sexo', '$idCategoria')";

// Ejecutar y validar el comando SQL 
if ($mysqli->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


$nro_orden = "SELECT nro_orden FROM clientes WHERE DNI = $dni LIMIT 1";
$resultado = mysqli_query($mysqli, $nro_orden);
$coso = mysqli_fetch_array($resultado);
$nro_orden = $coso['nro_orden'];

$sql2 = "INSERT INTO actividades(nro_orden, idDisciplina) VALUES ('$nro_orden', '$idCategoria')";
if ($mysqli->query($sql2) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}

$mysqli->close();  // Cerrar conexión

echo "<script>history.go(-1);</script>";