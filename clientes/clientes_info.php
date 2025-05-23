<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ./errors/error_nologueado");
    die();
}

include "../database/conexion.php";
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <link rel="icon" type="image/png" href="Images/logo-negro.png">
    <link rel="icon" type="image/png" href="Images/logo-blanco.png" media="(prefers-color-scheme:dark)">
    <title>FomentAR</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand mb-0 h1" href="../pagina_principal">
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
                <li class="nav-item active">
                    <a class="nav-link" href="../pagina_principal">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='../clientes'>Todos los Clientes</a>
                </li>
                <li class="nav-item">
                    <?php
                    $varsesion = $_SESSION['usuario'];
                    if ($varsesion == "presidente") {
                        echo "	<a class='nav-link' href='../recaudacion'>Recaudacion</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='../reporte_errores'>Reporte Errores</a>
                </li>
                <li class="nav-item">
                    <?php
                    $varsesion = $_SESSION['usuario'];
                    if ($varsesion == "presidente") {
                        echo "	<a class='nav-link' href='../gestion_usuarios'>Gestion de usuarios</a>";
                    }
                    ?>
                </li>
            </ul>
            <a class="btn btn-primary disabled text-white mr-2" role="button" disabled
                style="text-transform: capitalize;">
                <?php
                echo $varsesion;
                ?>
            </a>
            <a class="btn btn-outline-danger" href="../database/cerrar_sesion" role="button">Cerrar sesión</a>
        </div>
    </nav>
    <div class="container-fluid2">
        <div class="row">
            <div class="col w-20">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Deportes de:
                            <?php
                            $sql = "SELECT cli.nombre, act.nombre_actividad FROM clientes_actividad cli_act, clientes cli, actividades act WHERE cli_act.id_cliente = cli.id_cliente and cli_act.id_actividad = act.id_actividad and cli.id_cliente = $_GET[id_cliente] LIMIT 1";
                            $result = mysqli_query($conexion, $sql);
                            while ($mostrar = mysqli_fetch_assoc($result)) {
                                echo $mostrar['nombre'];
                            }
                            ?>
                        </h5>
                        <?php
                        $sql = "SELECT cli.nombre, act.id_actividad,act.nombre_actividad, act.color_act FROM clientes_actividad cli_act, clientes cli, actividades act WHERE cli_act.id_cliente = cli.id_cliente and cli_act.id_actividad = act.id_actividad and cli.id_cliente = $_GET[id_cliente]";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_assoc($result)) {
                            echo '<a href="./clientesporactividad.php?id_actividad=' . $mostrar['id_actividad'] . '" class="badge badge-' . $mostrar['color_act'] . ' mr-2">' . $mostrar['nombre_actividad'] . '</a>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-80">
            <div class="contenedor1">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Lista de Pagos</caption>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Deporte</th>
                                <th scope="col">Pago</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="#" class="badge badge-dark">Futbol</a></td>
                                <td>$500</td>
                                <td>28/10/2018</td>
                                <td><span class="badge badge-success">Al dia</span></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Editar">
                                        <i class="material-icons">
                                            edit
                                        </i>
                                    </button>
                                    <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Editar">
                                        <i class="material-icons">
                                            edit
                                        </i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Borrar"><i
                                            class="material-icons">
                                            delete
                                        </i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><a href="#" class="badge badge-danger">Taekwondo</a></td>
                                <td>$200</td>
                                <td>27/10/2018</td>
                                <td><span class="badge badge-danger">Debe $300</span></td>
                                <td><button type="button" class="btn btn-warning" data-toggle="tooltip"
                                        title="Editar"><i class="material-icons">
                                            edit
                                        </i></button>
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Borrar"><i
                                            class="material-icons">
                                            delete
                                        </i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <?php include "../scripts.php"; ?>
</body>

</html>