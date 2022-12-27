<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}
$conexion = mysqli_connect("localhost", "root", "", "fomentar");

$consulta = ConsultarProducto($_GET['id_user']);

function ConsultarProducto($id_user)
{
    $conexion = mysqli_connect("localhost", "root", "", "fomentar");
    $sentencia = "SELECT * FROM usuarios WHERE id_user='" . $id_user . "' ";
    $resultado = $conexion->query($sentencia) or die("Error al consultar usuario" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();

    return [
        $fila['username'],
        $fila['password'],
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
    <link href="../css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/select2-bootstrap4.min.css">
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
                <input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>">
                <label>Modificar Usuario</label>
                <input type="text" class="form-control" placeholder="Usuario" name="nombre"
                    value="<?php echo $consulta[0] ?>" disabled>
            </div>
            <!-- <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña">
                    </div>
                </div>
                <input type="password" class="form-control" id="myInput" placeholder="Contraseña" name="password"
                    value="<?php echo $consulta[1] ?>">
            </div> -->
            <div class="form-group">
                <label for="exampleFormControlSelect1">Rol De Usuario</label>
                <?php
                include '../database/conexion.php';
                $id_user = $_GET['id_user'];
                $consulta = "SELECT username,id_rol FROM `usuarios` WHERE id_user=$id_user";
                $result = mysqli_query($conexion, $consulta);
                $usergenero = [];
                foreach ($result as $fetchrow) {
                    $userrol[] = $fetchrow['id_rol'];
                }
                ?>
                <select simple class="form-control js-example-basic-single" id="exampleFormrControlSelect" name="tipo"
                    required>
                    <?php
                    $sqlrol = "SELECT * FROM roles";
                    $sql_correr = mysqli_query($conexion, $sqlrol);
                    if (mysqli_num_rows($sql_correr) > 0) {
                        foreach ($sql_correr as $row) {
                    ?>
                    <option value="<?= $row['id_rol']; ?>" <?= in_array($row['id_rol'], $userrol) ? 'selected' : '' ?>>
                        <?= $row['name_rol']; ?>
                    </option>
                    <?php
                        }
                    } else {
                    ?>
                    <option value="">Sin rol</option>
                    <?php
                    }
                    ?>
                </select>
                <input type="submit" name="submit" class="btn btn-primary mt-2" value="Actualizar">
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
    <script src="../js/select2.min.js"></script>
</body>

</html>