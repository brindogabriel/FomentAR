<?php

//! VARIABLES FORMULARIO
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
$Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
$diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);

//! HACER SELECT DE QUE CATEGORIA ES CON EL BETWEEN XD
if ($actividades == "basquet"&$sexo = 3&$diferencia_anios <= 6 || $diferencia_anios >= 10) {
    $idCategoria = 1;
}

//! FOREACH POR CADA ACTIVIDAD ANASHE

foreach ($actividades as $lista_actividades) {
    //? SELECCIONA ID_CATEGORIA DE CADA ACTIVIDAD SELECCIONADA

    $queryid_categoria = "SELECT cat.id_actividad,cat.id_categoria, act.nombre_actividad, cat.categoria_detalle, cli.id
        FROM categorias cat,clientes cli,actividades act
        WHERE
        cli.edad BETWEEN cat.edad_inicial and cat.edad_final
        AND
        cli.id_genero = cat.id_genero
        AND
         $lista_actividades = act.id
        AND
        act.id = cat.id_actividad
        AND cli.id = $id_cli";
    $resultado = mysqli_query($conexion, $queryid_categoria);
    $coso = mysqli_fetch_array($resultado);
    $id_categoria = $coso['id_categoria'];

    //? INSERTA EN CLIENTES_ACTIVIDAD CADA ACTIVIDAD CON SU CLIENTE Y SU CATEGORIA RESPECTIVA

    $query = "INSERT INTO clientes_actividad (id_cli,id_act,id_cat)
        VALUES ('$id_cli','$lista_actividades','$id_categoria')";
    $query_run = mysqli_query($conexion, $query);
}

// Crear objeto de conexión con la base de datos
include "../database/conexion.php";

/* Verificar errores de conexion con la BD */
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

// crear cadena de inserción SQL
$sql = "INSERT INTO clientes(Nombre,Apellido,Domicilio,DNI,Fecha_nacimiento,Fecha_ingreso,idParametro_Socio,idEstado,idSexo,idCategoria) VALUES ('$nombre','$apellido','$domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$estado','$sexo', '$idCategoria')";

// Ejecutar y validar el comando SQL
if ($conexion->query($sql) === true) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$sqlNro_orden = "SELECT Nro_orden FROM clientes WHERE DNI = $dni LIMIT 1";
$resultado = mysqli_query($mysqli, $sqlNro_orden);
$coso = mysqli_fetch_array($resultado);
$Nro_orden = $coso['Nro_orden'];

$sql2 = "INSERT INTO actividades(Nro_orden, idDisciplina) VALUES ('$Nro_orden', '$idCategoria')";
if ($conexion->query($sql2) === true) {
    //echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $conexion->error;
}

$mysqli->close(); // Cerrar conexión

/*echo "<script>history.go(-1);</script>"; */