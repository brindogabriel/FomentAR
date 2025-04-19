<?php
session_start();
error_reporting(0); 

$varsesion = $_SESSION['usuario'];
$rol = $_SESSION['id_rol'];

if ($varsesion == NULL || $varsesion = '' || empty($varsesion)) {
    header("location: ./errors/error_nologueado");
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
    <link rel="icon" type="image/png" href="Images/logo-negro.png">
    <link rel="icon" type="image/png" href="Images/logo-blanco.png" media="(prefers-color-scheme:dark)">
    <meta name="msapplication-TileColor" content="#343a40" />
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#343a40" />
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#343a40" />
    <link rel="stylesheet" href="./css/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(45deg, #343a40, #495057);
        }
        
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background: var(--primary-gradient) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card-columns {
            padding: 2rem;
            column-count: 3;
        }

        @media (max-width: 768px) {
            .card-columns {
                column-count: 2;
            }
        }

        @media (max-width: 576px) {
            .card-columns {
                column-count: 1;
            }
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
            background: white;
        }

        .card-text {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #343a40;
        }

        .card-text:nth-child(2) {
            font-weight: bold;
            color: #007bff;
        }

        .btn-secondary {
            background: var(--primary-gradient);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .footer {
            background: var(--primary-gradient) !important;
            margin-top: 2rem;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #007bff;
        }

        .activity-count {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            margin: 0.5rem 0;
        }

        .dropdown-divider {
            margin: 1rem 0;
            opacity: 0.2;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand svg {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover svg {
            transform: scale(1.1);
        }
    </style>
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
                <li class="nav-item active">
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
                <li class='nav-item'>                        
                        <a class='nav-link' href='./recaudacion'>Recaudacion</a>
                          </li>";
                }
                ?>

                <li class="nav-item">
                    <a class='nav-link' href='./reporte_errores'>Reporte Errores</a>
                </li>
 <li class="nav-item">
                    <a class='nav-link' href='./facturacion'>Facturacion</a>
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
    <div class="card-columns">
        <div class="card">
            <a href="./clientes/clientesporactividad.php?id_actividad=2"><img class="card-img-top "
                    src="Images/futbol.jpg" alt="Card image cap"></a>
            <div class="card-body text-center">
                <h5 class="card-text">Fútbol</h5>
                <div class="activity-count">
                    <?php
                    $sql = "SELECT COALESCE(COUNT(id_cliente), 0) as personas  from clientes_actividad where id_actividad = 2;";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {
                        echo $mostrar['personas'];
                    }
                    ?>
                    <small>clientes</small>
                </div>
                <div class="dropdown-divider"></div>
                <a class="btn btn-secondary btn-block mt-3" href="./clientes/clientesporactividad.php?id_actividad=2"
                    role="button">Ver Clientes</a>
            </div>
        </div>
        <div class="card">
            <a href="./clientes/clientesporactividad.php?id_actividad=6"><img class="card-img-top "
                    src="Images/arte.jpg" alt="Card image cap"></a>
            <div class="card-body text-center">
                <p class="card-text">Arte</p>
                <p class="card-text">
                    <?php
                    $sql = "SELECT COALESCE(COUNT(id_cliente), 0) as personas  from clientes_actividad where id_actividad = 6;";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {
                        echo $mostrar['personas'];
                    }
                    ?> clientes
                </p>
                <div class="dropdown-divider"></div>
                <a class="btn btn-secondary btn-block mt-3" href="./clientes/clientesporactividad.php?id_actividad=6"
                    role="button">Ver Clientes</a>
            </div>
        </div>
        <div class="card">
            <a href="./clientes/clientesporactividad.php?id_actividad=1"><img class="card-img-top "
                    src="Images/basquet.jpg" alt="Card image cap"></a>
            <div class="card-body text-center">
                <p class="card-text">Basquet</p>
                <p class="card-text">
                    <?php
                    $sql = "SELECT COALESCE(COUNT(id_cliente), 0) as personas  from clientes_actividad where id_actividad = 1;";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {

                        echo $mostrar['personas'];
                    }
                    ?> clientes
                </p>
                <div class="dropdown-divider"></div>
                <a class="btn btn-secondary btn-block mt-3" href="./clientes/clientesporactividad.php?id_actividad=1"
                    role="button">Ver Clientes</a>
            </div>
        </div>
        <div class="card">
            <a href="./clientes/clientesporactividad.php?id_actividad=5"><img class="card-img-top "
                    src="Images/taekwondo.jpg" alt="Card image cap"></a>
            <div class="card-body text-center">
                <p class="card-text">Taekwondo</p>
                <p class="card-text">
                    <?php
                    $sql = "SELECT COALESCE(COUNT(id_cliente), 0) as personas  from clientes_actividad where id_actividad = 5;";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {

                        echo $mostrar['personas'];
                    }
                    ?> clientes
                </p>
                <div class="dropdown-divider"></div>
                <a class="btn btn-secondary btn-block mt-3" href="./clientes/clientesporactividad.php?id_actividad=5"
                    role="button">Ver Clientes</a>
            </div>
        </div>
        <div class="card">
            <a href="./clientes/clientesporactividad.php?id_actividad=3"><img class="card-img-top "
                    src="Images/voley.jpg" alt="Card image cap"></a>
            <div class="card-body text-center">
                <p class="card-text">Voley</p>
                <p class="card-text">
                    <?php
                    $sql = "SELECT COALESCE(COUNT(id_cliente), 0) as personas  from clientes_actividad where id_actividad = 3;";

                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {

                        echo $mostrar['personas'];
                    }
                    ?> clientes
                </p>
                <div class="dropdown-divider"></div>
                <a class="btn btn-secondary btn-block mt-3" href="./clientes/clientesporactividad.php?id_actividad=3"
                    role="button">Ver Clientes</a>
            </div>
        </div>
        <div class="card">
            <a href="./clientes/clientesporactividad.php?id_actividad=4"><img class="card-img-top "
                    src="Images/patin.jpg" alt="Card image cap"></a>
            <div class="card-body text-center">
                <p class="card-text">Patín</p>
                <p class="card-text">
                    <?php
                    $sql = "SELECT COALESCE(COUNT(id_cliente), 0) as personas  from clientes_actividad where id_actividad = 4;";

                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {

                        echo $mostrar['personas'];
                    }
                    ?> clientes
                </p>
                <div class="dropdown-divider"></div>
                <a class="btn btn-secondary btn-block mt-3" href="./clientes/clientesporactividad.php?id_actividad=4"
                    role="button">Ver Clientes</a>
            </div>
        </div>
    </div>
    <!-- Begin page content -->
    <footer class="footer bg-dark p-4 text-center">
        <div class="container">
            <span class="text-white">Página diseñada y desarrollada por <a
                                    href="https://www.linkedin.com/in/gabrielsebastianbrindo"
                                    target="_blank"
                                    ><strong>Brindo Gabriel</strong>
                                </a> y  <a
                                    href="https://www.linkedin.com/in/cristian-villavicencio-19572a177"
                                    target="_blank"
                                    ><strong>Villavicencio Cristian</strong>
                                </a> - 2018
                ©</span>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>

</html>