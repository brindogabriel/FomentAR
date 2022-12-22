<?php
//! BASE DE DATOS CONEXION|
include "../database/conexion.php";

//! SI SE TOCÓ EL BOTÓN DE SUBMIT DEL FORMULARIO
if (isset($_POST['submit'])) {
    //! VARIABLES DEL FORMULARIO
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $domicilio = $_POST["domicilio"];
    $num_domicilio = $_POST["num_domicilio"];
    $telefono = $_POST["telefono"];
    $dni = $_POST["DNI"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $socio = $_POST["num_socio"];
    $sexo = $_POST["Sexo"];
    $actividades = $_POST["actividades"];
    $edad = $_POST["edad"];
    $id_cliente = $_GET["id_cliente"];
    $Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
    $diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);

    //!ACTUALIZAR AL CLIENTE SEGUN EL CLIENTE
    $sql = "UPDATE `clientes` SET `nombre` = '$nombre', `apellido` = '$apellido', `edad` = '$edad', `id_genero` = '$sexo', `domicilio` = '$domicilio', `num_domicilio` = '$num_domicilio', `telefono` = '$telefono', `DNI` = '$dni', `fecha_nacimiento` = '$fecha_nacimiento', `fecha_ingreso` = '$fecha_ingreso' WHERE `clientes`.`id_cliente` = $id_cliente";
    $query_run = mysqli_query($conexion, $sql);

    //! SELECCIONAR AL CLIENTE // CREO QUE ES INNECESARIO ACÁ XD 
    $sqlNro_orden = "SELECT id_cliente,id_genero FROM clientes WHERE DNI = $dni LIMIT 1";
    $resultado = mysqli_query($conexion, $sqlNro_orden);
    $coso = mysqli_fetch_array($resultado);
    $id_cliente = $coso['id_cliente'];
    $id_genero = $coso['id_genero'];

    //! DELETE DE TODAS LAS ACTIVIDADES DEL CLIENTE
    $borrar_acts = "DELETE FROM `clientes_actividad` WHERE id_cliente = $id_cliente";
    $resultado = mysqli_query($conexion, $borrar_acts);

    //! SELECCIONAR EL ID CATEGORIA DE CADA ACTIVIDAD
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
        //! INSERTAR NUEVAS ACTIVIDADES DEL CLIENTE
        $query = "INSERT INTO clientes_actividad (id_cliente,id_actividad,id_categoria) VALUES ('$id_cliente','$lista_actividades','$id_categoria')";
        $query_run = mysqli_query($conexion, $query);
    }

    echo "<script>history.go(-1);</script>";
} else {
    echo "volvó y llena el form xd";
}