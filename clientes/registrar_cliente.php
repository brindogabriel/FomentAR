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
    $num_domicilio = $_POST["num_domicilio"];
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
    $sql = "INSERT INTO clientes(nombre,apellido,domicilio,num_domicilio,DNI,fecha_nacimiento,fecha_ingreso,num_socio,id_genero,edad) VALUES ('$nombre','$apellido','$domicilio','$num_domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$sexo', '$edad')";

    // Ejecutar y validar el comando SQL
    if ($conexion->query($sql) === true) {
        echo "Nuevo cliente registrado exitosamente!!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $sqlNro_orden = "SELECT id_cliente,id_genero FROM clientes WHERE DNI = $dni LIMIT 1";
    $resultado = mysqli_query($conexion, $sqlNro_orden);
    $coso = mysqli_fetch_array($resultado);
    $id_cliente = $coso['id_cliente'];
    $id_genero = $coso['id_genero'];

    //! FOREACH POR CADA ACTIVIDAD ANASHE

    foreach ($actividades as $lista_actividades) {
        $queryid_categoria = "SELECT cat.id_categoria, cat.categoria_detalle
        FROM categorias cat
        JOIN clientes cli ON
        cli.edad BETWEEN cat.edad_inicial AND cat.edad_final
        JOIN actividades act ON
        cat.id_actividad = act.id_actividad
        AND
        $lista_actividades = cat.id_actividad
        AND
        $id_genero = cat.id_genero
        AND
        $id_cliente = cli.id_cliente;";
        $resultado = mysqli_query($conexion, $queryid_categoria);
        $coso2 = mysqli_fetch_array($resultado);

        $id_categoria = $coso2['id_categoria'];

        $query = "INSERT INTO clientes_actividad (id_cliente,id_actividad,id_categoria) VALUES ('$id_cliente','$lista_actividades','$id_categoria')";
        $query_run = mysqli_query($conexion, $query);
    }

    /*echo "<script>history.go(-1);</script>"; */
    echo "todo ok";
} else {
    echo "volve y llena el form xd";
}