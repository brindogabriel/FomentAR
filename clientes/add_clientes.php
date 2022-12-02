<?php
//? CONECTAR A LA BASE
include "../database/conexion.php";
//? SI SE PRESIONO EL BOTON DE ENVIAR FORMULARIO
if (isset($_POST['submit'])) {

    //? VARIABLES DEL FORMULARIO
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $domicilio = $_POST["domicilio"];
    $num_domicilio = $_POST["domicilio"];
    $telefono = $_POST["telefono"];
    $dni = $_POST["DNI"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $edad = $_POST["edad"];
    //$fecha_ingreso = date("Y-m-d");
    $num_domicilio = $_POST["num_domicilio"];
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $num_socio = $_POST["num_socio"];
    $id_genero = $_POST["Sexo"];
    $actividades = $_POST["actividades"];

    //? INSERT EN TABLA CLIENTE
    $queryidcliente = "INSERT INTO clientes
	(num_socio, nombre,apellido, edad, id_genero, domicilio, num_domicilio, telefono, DNI, fecha_ingreso, fecha_nacimiento) VALUES ( '$num_socio', '$nombre','$apellido', '$edad','$id_genero','$domicilio', '$num_domicilio', '$telefono', '$dni', '$fecha_ingreso', '$fecha_nacimiento');";
    $query_correr = mysqli_query($conexion, $queryidcliente);

    //? SELECCIONA EL CLIENTE QUE SE ACABA DE REGISTRAR
    $queryid_cliente = "SELECT id AS id_cliente,id_genero FROM clientes WHERE DNI = $dni LIMIT 1";
    $resultado = mysqli_query($conexion, $queryid_cliente);
    $coso = mysqli_fetch_array($resultado);
    $id_cli = $coso['id_cliente'];
    $id_genero = $coso['id_genero'];

    //?FOREACH ACTIVIDADES CON ID_CATEGORIA

    foreach ($actividades as $lista_actividades) {
        //? SELECCIONA ID_CATEGORIA DE CADA ACTIVIDAD SELECCIONADA

        $queryid_categoria = "SELECT cat.id_actividad,cat.id_categoria, act.nombre_actividad, cat.categoria_detalle, cli.id_cliente FROM categorias cat,clientes cli,actividades act WHERE cli.edad BETWEEN cat.edad_inicial and cat.edad_final AND cli.id_genero = cat.id_genero AND 1 = act.id_actividad AND act.id_actividad = cat.id_actividad AND cli.id_cliente = 1;";
        $resultado = mysqli_query($conexion, $queryid_categoria);
        $coso = mysqli_fetch_array($resultado);
        $id_categoria = $coso['id_categoria'];

        //? INSERTA EN CLIENTES_ACTIVIDAD CADA ACTIVIDAD CON SU CLIENTE Y SU CATEGORIA RESPECTIVA

        $query = "INSERT INTO clientes_actividad (id_cli,id_act,id_cat)
        VALUES ('$id_cli','$lista_actividades','$id_categoria')";
        $query_run = mysqli_query($conexion, $query);
    }
    echo "Se ha registrado el cliente con exito!, revisar la db xdddd";
} else {
    echo "no se ha presionado nada, vuelta y llene el formulario xd";
}