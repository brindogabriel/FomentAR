<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}
$conexion = mysqli_connect("localhost", "root", "", "fomentar");

$consulta = ConsultarProducto($_GET['username']);

function ConsultarProducto($username)
{
    $conexion = mysqli_connect("localhost", "root", "", "fomentar");
    $sentencia = "SELECT * FROM usuarios WHERE username='" . $username . "' ";
    $resultado = $conexion->query($sentencia) or die("Error al consultar usuario" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();

    return [
        $fila['username'],
        $fila['password'],
        $fila['id_rol']
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
    <title>FomentAR</title>
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#343a40">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#343a40">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
    <title>FomentAR</title>
</head>

<body>
    <div class="form-login">
        <form action="modificar2.php" method="post">
            <div class="form-group">
                <input type="hidden" name="Usuario" value="<?php echo $_GET['username'] ?>">
                <label>Modificar Usuario</label>
                <input type="text" class="form-control" placeholder="Usuario" name="nombre"
                    value="<?php echo $consulta[0] ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña">
                    </div>
                </div>
                <input type="password" class="form-control" id="myInput" placeholder="Contraseña" name="password"
                    value="<?php echo $consulta[1] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo De Usuario</label>
                <?php
                include '../database/conexion.php';
                $username = $_GET['username'];
                $consulta = "SELECT u.id_user,u.username,u.password,r.name_rol,u.id_rol FROM usuarios u JOIN roles r ON u.id_rol = r.id_rol AND u.username = '$username';";
                $result = mysqli_query($conexion, $consulta);
                $bandera = true;
                ?>

                <!-- en lugar del div.cajaselect -->
                <select class="form-control" id="exampleFormControlSelect1" name="tipo">
                    <?php
                    while ($filas = mysqli_fetch_array($result)) {
                        $id_rol = $filas['id_rol']; // guarda el id del registro
                        $name_rol = $filas['name_rol']; // guarda el dato del registro
                    ?>
                    <!-- en el value se inyecta el id, con la bandera se verifica que sea la primera iteracion del bucle -->
                    <option value="<?php echo $id_rol; ?>">
                        <?php echo $name_rol; /* imprime el sector en el option */?>
                    </option>
                    <?php
                        $bandera = false;
                    }
                    ?>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
</body>

</html>