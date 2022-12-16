<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}

$conexion = mysqli_connect("localhost", "root", "", "fomentar");

$consulta = ConsultarCliente($_GET['id_cliente']);

function ConsultarCliente($id_cliente)
{
    include "../database/conexion.php";
    $sentencia = "SELECT cli_act.id_actividad,cli.num_socio,cli.domicilio,cli.fecha_nacimiento,cli.fecha_ingreso,cli.DNI,cli.id_cliente,cli.nombre, cli.apellido, act.nombre_actividad
FROM
clientes_actividad cli_act JOIN clientes cli ON cli_act.id_cliente = cli.id_cliente
JOIN actividades act ON cli_act.id_actividad = act.id_actividad AND cli_act.id_cliente = $id_cliente";
    $resultado1 = $conexion->query($sentencia) or die("Error al consultar cliente" . mysqli_error($conexion));
    $fila = mysqli_fetch_array($resultado1);

    return [
        $fila['nombre'], // 0
        $fila['apellido'], // 1
        $fila['domicilio'], // 2
        $fila['DNI'], //3
        $fila['fecha_nacimiento'], //4
        $fila['fecha_ingreso'], //5
        $fila['num_socio'], //6
        $fila['nombre_actividad'], //7
        $fila['id_actividad'] // 8
    ];
}



?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Resources/material-icons.css">
    <link href="../css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/select2-bootstrap4.min.css">
    <title>FomentAR</title>
</head>

<body>
    <div class="contenedor p-1">

        <form action="modificar6.php" method="post">
            <div class="form-group">
                <input type="hidden" name="Usuario" value="<?php echo $_GET['id_cliente'] ?>">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre"
                    value="<?php echo $consulta[0] ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido" name="apellido"
                    value="<?php echo $consulta[1] ?>" required>
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio</label>
                <input type="text" class="form-control" placeholder="Domicilio" name="domicilio"
                    value="<?php echo $consulta[2] ?>" required>
            </div>
            <div class="form-group">
                <label for="user">DNI</label>
                <input type="number" class="form-control" placeholder="DNI" name="DNI" id="cantidad"
                    value="<?php echo $consulta[3] ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" max="3000-12-31" min="1000-01-01" class="form-control"
                    placeholder="Fecha de nacimiento" name="fecha_nacimiento" value="<?php echo $consulta[4] ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso" max="3000-12-31" min="1000-01-01" class="form-control"
                    placeholder="Fecha de ingreso" name="fecha_ingreso" value="<?php echo $consulta[5] ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect">¿Es Socio?</label>
                <input type="number" class="form-control" id="exampleFormControlSelect" name="socio"
                    placeholder="<?php echo ($consulta[6]) ? $consulta[6] : "No es socio"; ?>">
            </div>
            <div class="form-group">


                <select class="form-control js-example-basic-multiple" name="actividades[]" multiple="multiple"
                    style="width:100%;" id="mySelect2" lang="es" required>
                    <?php
                    $sql_actividades = "SELECT * FROM actividades";
                    $sql_correr = mysqli_query($conexion, $sql_actividades);
                    while ($mostrar = mysqli_fetch_array($sql_correr)) {
                        echo "<option value=" . $mostrar['id_actividad'] . " selected>
                       " . $mostrar['nombre_actividad'] . "
                    </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="dropdown-divider"></div>
            <button type="button" class="btn btn-secondary float-right" onclick="history.back()">Cancelar</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Actualizar">
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script>
    $.fn.select2.defaults.set("language", "es");
    $(document).ready(function() {
        $('#mySelect2').select2({

            language: "es",
            placeholder: 'Seleccione una o varias actividades',

        });
    });
    </script>
    <script src="../js/script.js"></script>
</body>

</html>