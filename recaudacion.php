<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
$rol = $_SESSION['id_rol'];

if ($varsesion == null || $varsesion = '') {
    header("location: ./errors/error_nologueado");
    die();
}
if ($rol != 1) {
    header("location: ./errors/error_privilegio");
    die();
}
include "./database/conexion.php";
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./Resources/material-icons.css">
    <title>FomentAR</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand mb-0 h1" href="pagina_principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M4 10v7h3v-7H4zm6 0v7h3v-7h-3zM2 22h19v-3H2v3zm14-12v7h3v-7h-3zm-4.5-9L2 6v2h19V6l-9.5-5z"
                    fill="white" />
            </svg>
            FomentAR
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="./pagina_principal">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='./clientes'>Todos los Clientes</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='./eventos'>Eventos</a>
                </li>
                <?php
                if ($rol == 1) {
                    echo "
                <li class='nav-item active'>                        
                        <a class='nav-link' href='./recaudacion'>Recaudacion</a>
                          </li>";
                }
                ?>

                <li class="nav-item">
                    <a class='nav-link' href='./reporte_errores'>Reporte Errores</a>
                </li>

                <?php
                if ($rol == 1) {

                    echo "<li class='nav-item'>
                        <a class='nav-link' href='./gestion_usuarios'>Gestion de usuarios</a>
                        </li>";
                }
                ?>

            </ul>
            <a class="btn btn-primary disabled text-white mr-2" role="button" disabled
                style="text-transform: capitalize;">
                <?php
                $varsesion = $_SESSION['usuario'];
                echo $varsesion;
                ?>
            </a>
            <a class="btn btn-outline-danger" href="./database/cerrar_sesion" role="button">Cerrar sesión</a>
        </div>
    </nav>


    <?php
    $varsesion = $_SESSION['usuario'];
    if ($varsesion == "usuario") {
        header("location: ./errors/error_privilegio");
        die();
    }
    ?>
    <?php $dinero = 123456789 ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">$<?php echo $dinero ?> recaudados en total</h1>
            <p class="lead"></p>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <?php include("./scripts.php"); ?>
</body>

</html>