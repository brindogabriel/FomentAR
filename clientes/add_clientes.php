<?php
//? CONECTAR A LA BASE
include "../database/conexion.php";
//? SI SE PRESIONO EL BOTON DE ENVIAR FORMULARIO
if (isset($_POST['submit'])) {

//? VARIABLES DEL FORMULARIO
    $nombre = $_POST["nombre"];
    $domicilio = $_POST["domicilio"];
    $num_domicilio = $_POST["domicilio"];
    $telefono = $_POST["telefono"];
    $dni = $_POST["DNI"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    //$edad = $_POST["edad"];
    $edad = 6;
    //$fecha_ingreso = date("Y-m-d");
    $fecha_ingreso = $_POST["fecha_ingreso"];

    $num_socio = $_POST["num_socio"];
    $id_genero = $_POST["Sexo"];
    $actividades = $_POST["actividades"];
//?INSERT INTO CLIENTE
    $queryidcliente = "INSERT INTO clientes
	(num_socio, nombre, edad, id_genero, domicilio, num_domicilio, telefono, DNI, fecha_ingreso, fecha_nacimiento) VALUES ( '$num_socio', '$nombre', '$edad','$id_genero','$domicilio', '$num_domicilio', '$telefono', '$dni', '$fecha_ingreso', '$fecha_nacimiento');";
    $query_correr = mysqli_query($conexion, $queryidcliente);

//?SELECT IDCLIENTE FROM CLIENTES MEDIO FALOPA POR QUE TRAE DESDE EL DNI Y SKERE

    $queryid_cliente = "SELECT id_cliente FROM clientes WHERE DNI = $dni LIMIT 1";
    $resultado = mysqli_query($conexion, $queryid_cliente);
    $coso = mysqli_fetch_array($resultado);
    $id_cli = $coso['id_cliente'];

//?FOREACH ACTIVIDADES con idcategoria
    foreach ($actividades as $lista_actividades) {

        $queryid_categoria = "SELECT id_categoria, categoria_detalle
    FROM categorias, clientes
    WHERE
    clientes.id_genero=$id_genero and
    clientes.id_genero = categorias.id_genero
    AND
    categorias.id_actividad = $actividades
    and
    clientes.edad=$edad
    and
    clientes.edad BETWEEN categorias.edad_inicial AND categorias.edad_final;";
        $resultado = mysqli_query($conexion, $queryid_categoria);
        $coso = mysqli_fetch_array($resultado);
        $id_categoria = $coso['id_categoria'];

        $query = "INSERT INTO clientes_actividad (id_cliente,id_actividad,id_categoria) VALUES ('$id_cli','$lista_actividades','$id_categoria')";
        $query_run = mysqli_query($conexion, $query);
    }
}