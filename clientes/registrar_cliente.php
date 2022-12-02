<?php

//! USAR DB FOMENTAR / NO USAR PRIMER FOMENTAR

//! CONECTAR A LA BASE DE DATOS
include "../database/conexion.php";
//! VERIFICAR ERRORES DE CONEXION CON LA BASE DE DATOS
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
//! VERIFICAR SI SE PRESIONO EL BOTON Y DESPUES SKERE
if (isset($_POST['submit'])) {
    //! VARIABLES FORMULARIO
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $domicilio = $_POST["domicilio"];
    $dni = $_POST["DNI"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $socio = $_POST["num_socio"];
    $sexo = $_POST["Sexo"];
    $actividades = $_POST["actividades"];
    $edad = $_POST["edad"];
    $Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
    $diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);

    // crear cadena de inserción SQL
    $sql = "INSERT INTO clientes(nombre,apellido,domicilio,DNI,fecha_nacimiento,fecha_ingreso,num_socio,id_genero,edad) VALUES ('$nombre','$apellido','$domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$sexo', '$edad')";

    // Ejecutar y validar el comando SQL
    if ($conexion->query($sql) === true) {
        echo "Nuevo cliente registrado exitosamente!!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $sqlNro_orden = "SELECT id_cliente FROM clientes WHERE DNI = $dni LIMIT 1";
    $resultado = mysqli_query($conexion, $sqlNro_orden);
    $coso = mysqli_fetch_array($resultado);
    $id_cliente = $coso['id_cliente'];

    //! FOREACH POR CADA ACTIVIDAD ANASHE

    foreach ($actividades as $lista_actividades) {
        //? SELECCIONA ID_CATEGORIA DE CADA ACTIVIDAD SELECCIONADA
        $queryid_categoria = "SELECT cat.idCategoria, dis.Detalle, cat.Descripcion, cli.Nro_orden
        FROM categorias cat,clientes cli,disciplinas dis
        WHERE
        cli.edad BETWEEN cat.Edad_Inicial and cat.Edad_Final
        AND
        cli.idSexo = cat.idSexo
        and
        $lista_actividades = dis.idDisciplina
        AND
        dis.idCategoria = cat.idCategoria
        AND
        cli.id_cliente = $id_cliente";
        $resultado = mysqli_query($conexion, $queryid_categoria);
        $coso = mysqli_fetch_array($resultado);
        $id_categoria = $coso['id_categoria'];

        $query = "INSERT INTO actividades (Nro_Orden, idDisciplina) VALUES ('$id_cliente', '$id_categoria')";
        $query_run = mysqli_query($conexion, $query);
    }

    /*echo "<script>history.go(-1);</script>"; */
    echo "todo ok";
} else {
    echo "volve y llena el form xd";
}