<?php
//! CONECTAR A LA BASE DE DATOS XD
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
    $socio = 1;
    $estado = 1;
    $sexo = $_POST["Sexo"];
    $actividades = $_POST["actividades"];
    $edad = $_POST["edad"];
    $Edad = strtotime($fecha_ingreso) - strtotime($fecha_nacimiento);
    $diferencia_anios = intval($Edad / 60 / 60 / 24 / 365.25);

//! HACER SELECT DE QUE CATEGORIA ES CON EL BETWEEN XD
    // if ($actividades == "basquet" && $sexo = 2 && $diferencia_anios <= 6 || $diferencia_anios >= 10) {
    //     $idCategoria = 1;
    // }

// crear cadena de inserción SQL
    $sql = "INSERT INTO clientes(Nombre,Apellido,Domicilio,DNI,Fecha_nacimiento,Fecha_ingreso,idParametro_Socio,idEstado,idSexo,edad) VALUES ('$nombre','$apellido','$domicilio','$dni','$fecha_nacimiento','$fecha_ingreso','$socio','$estado','$sexo', '$edad')";

// Ejecutar y validar el comando SQL
    if ($conexion->query($sql) === true) {
        echo "Nuevo cliente registrado exitosamente!!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $sqlNro_orden = "SELECT Nro_orden FROM clientes WHERE DNI = $dni LIMIT 1";
    $resultado = mysqli_query($conexion, $sqlNro_orden);
    $coso = mysqli_fetch_array($resultado);
    $Nro_orden = $coso['Nro_orden'];

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
        cli.Nro_orden = $Nro_orden";
        $resultado = mysqli_query($conexion, $queryid_categoria);
        $coso = mysqli_fetch_array($resultado);
        $id_categoria = $coso['id_categoria'];

        $query = "INSERT INTO actividades(Nro_orden, idDisciplina,idDisciplina) VALUES ('$Nro_orden', '$id_categoria','$lista_actividades')";
        $query_run = mysqli_query($conexion, $query);
    }

    $mysqli->close(); // Cerrar conexión

/*echo "<script>history.go(-1);</script>"; */
    echo "todo ok";
} else {
    echo "volve y llena el form xd";
}