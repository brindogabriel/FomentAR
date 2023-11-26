<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}
include "../database/conexion.php";
$consulta = ConsultarCliente($_GET['id_cliente']);
function ConsultarCliente($id_cliente)
{
    include "../database/conexion.php";
    $sentencia = "SELECT * FROM clientes WHERE id_cliente=$id_cliente";
    $resultado1 = $conexion->query($sentencia) or die("Error al consultar cliente" . mysqli_error($conexion));
    $fila = mysqli_fetch_array($resultado1);

    return [
        $fila['nombre'], // 0
        $fila['apellido'], // 1
        $fila['domicilio'], // 2
        $fila['num_domicilio'], // 3
        $fila['DNI'], //4
        $fila['fecha_nacimiento'], //5
        $fila['fecha_ingreso'], //6
        $fila['num_socio'], //7
        $fila['telefono'], // 8
        $fila['edad'] // 9
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
                <input type="hidden" name="id_cliente" value="<?php echo $_GET['id_cliente'] ?>">
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
                <label for="domicilio">num Domicilio</label>
                <input type="number" class="form-control" placeholder="num_domicilio" name="num_domicilio" id="cantidad"
                    value="<?php echo $consulta[3] ?>" required>
            </div>
            <div class="form-group">
                <label for="domicilio">telefono</label>
                <input type="number" class="form-control" placeholder="telefono" name="telefono" id="cantidad" required
                    value="<?php echo $consulta[8] ?>">
            </div>
            <div class="form-group">
                <label for="user">DNI</label>
                <input type="number" class="form-control" placeholder="DNI" name="DNI" id="cantidad"
                    value="<?php echo $consulta[4] ?>" required>
            </div>
            <div class="form-group">
                <label for="DNI">EDAD</label>
                <input type="number" class="form-control" placeholder="EDAD" name="edad" id="cantidad" required
                    value="<?php echo $consulta[9] ?>">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" max="3000-12-31" min="1000-01-01" class="form-control"
                    placeholder="Fecha de nacimiento" name="fecha_nacimiento" value="<?php echo $consulta[5] ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso" max="3000-12-31" min="1000-01-01" class="form-control"
                    placeholder="Fecha de ingreso" name="fecha_ingreso" value="<?php echo $consulta[6] ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect">¿Es Socio?</label>
                <input type="number" class="form-control" id="exampleFormControlSelect" name="socio"
                    placeholder="<?php echo ($consulta[7]) ? $consulta[7] : "No es socio"; ?>">
            </div>
            <?php
            if ($_GET['id_cliente']) {
                $id_cliente = $_GET['id_cliente'];
                $fetchquery = "SELECT id_genero FROM clientes WHERE id_cliente= $id_cliente";
                $fetchquery_run = mysqli_query($conexion, $fetchquery);
                $usergenero = [];
                foreach ($fetchquery_run as $fetchrow) {
                    $usergenero[] = $fetchrow['id_genero'];
                }
            }
            ?>
            <div class="form-group">
                <label for="exampleFormControlSelect">Sexo</label>
                <select simple class="form-control js-example-basic-single" id="exampleFormrControlSelect" name="Sexo"
                    required>
                    <?php
                    $sqlgenero = "SELECT * FROM generos";
                    $sql_correr = mysqli_query($conexion, $sqlgenero);
                    if (mysqli_num_rows($sql_correr) > 0) {
                        foreach ($sql_correr as $row) {
                    ?>
                    <option value="<?= $row['id_genero']; ?>"
                        <?= in_array($row['id_genero'], $usergenero) ? 'selected' : '' ?>>
                        <?= $row['genero_descripcion']; ?>
                    </option>
                    <?php
                        }
                    } else {
                    ?>
                    <option value="">Sin genero</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <?php
            if ($_GET['id_cliente']) {
                $id_cliente = $_GET['id_cliente'];
                $fetchquery = "SELECT cli_act.id_actividad,cli.num_socio,cli.domicilio,cli.fecha_nacimiento,cli.fecha_ingreso,cli.DNI,cli.id_cliente,cli.nombre, cli.apellido, act.nombre_actividad
                FROM
                clientes_actividad cli_act JOIN clientes cli ON cli_act.id_cliente = cli.id_cliente
                JOIN actividades act ON cli_act.id_actividad = act.id_actividad AND cli_act.id_cliente = $id_cliente";
                $fetchquery_run = mysqli_query($conexion, $fetchquery);
                $useractividades = [];
                foreach ($fetchquery_run as $fetchrow) {
                    $useractividades[] = $fetchrow['id_actividad'];
                }
            }
            ?>
            <div class="form-group">
                <select class="form-control js-example-basic-multiple" name="actividades[]" multiple="multiple"
                    style="width:100%;" id="mySelect2" lang="es" required>
                    <?php
                    $sqlactividades = "SELECT * FROM actividades";
                    $sql_correr = mysqli_query($conexion, $sqlactividades);
                    if (mysqli_num_rows($sql_correr) > 0) {
                        foreach ($sql_correr as $row) {
                    ?>
                    <option value="<?= $row['id_actividad']; ?>"
                        <?= in_array($row['id_actividad'], $useractividades) ? 'selected' : '' ?>>
                        <?= $row['nombre_actividad']; ?>
                    </option>
                    <?php
                        }
                    } else {
                    ?>
                    <option>Sin actividades</option>
                    <?php
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
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    </script>
    <script src="../js/script.js"></script>
</body>

</html>