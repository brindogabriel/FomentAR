<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}

$conexion = mysqli_connect("localhost", "root", "", "fomentar");

$consulta = ConsultarCliente($_GET['idevento']);

function ConsultarCliente($idevento)
{
    $conexion = mysqli_connect("localhost", "root", "", "fomentar");

    $sentencia = "SELECT eve.idevento,eve.nombre,eve.fecha_inicio,eve.fecha_fin,eve.estado,estado.descripcion,eve.importe from eventos eve, eventos_estado estado WHERE estado.estado = eve.estado and eve.idevento=  $idevento";
    $resultado1 = $conexion->query($sentencia) or die("Error al consultar cliente" . mysqli_error($conexion));
    $fila = mysqli_fetch_assoc($resultado1);





    return [
        $fila['idevento'],
        $fila['nombre'],
        $fila['fecha_inicio'],
        $fila['fecha_fin'],
        $fila['importe'],
    ];
}



?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Resources/material-icons.css">
    <title>FomentAR</title>
</head>

<body>
    <div class="contenedor p-1">
        <form action="modif_ev" method="post">
            <div class="form-group">
                <input type="hidden" name="idevento" value="<?php echo $_GET['idevento'] ?>">
                <label for="nombre">Nombre del evento</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre"
                    value="<?php echo $consulta[1] ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Fecha inicio</label>
                <input type="text" class="form-control" placeholder="fecha inicio" name="fecha_inicio"
                    value="<?php echo utf8_encode($consulta[2]) ?>" required>
            </div>
            <div class="form-group">
                <label for="domicilio">Fecha fin</label>
                <input type="text" class="form-control" placeholder="fecha fin" name="fecha_fin"
                    value="<?php echo $consulta[3] ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">importe</label>
                <input type="numer" name="importe" step="any" class="form-control" placeholder="importe" name="importe"
                    value="<?php echo $consulta[4] ?>" required>
            </div>
            <div class="dropdown-divider m-2"></div>
            <button type="button" class="btn btn-secondary float-right" onclick="history.back()">Cancelar</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Actualizar">
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>