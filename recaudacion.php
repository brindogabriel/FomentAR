<?php
session_start();
error_reporting(0);
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

// Calcular todas las estadísticas
$total_recaudado = 0;
$total_cuotas = 0;
$total_alquileres = 0;
$total_socios = 0;
$total_no_socios = 0;

// Consulta principal
$query = "SELECT t.Monto, t.tipo_pago, t.estado_pago, t.es_socio, t.FechaTransaccion, 
          c.nombre, c.apellido, a.nombre_actividad 
          FROM Transacciones t 
          LEFT JOIN clientes c ON t.PersonaID = c.id_cliente 
          LEFT JOIN actividades a ON t.ActividadID = a.id_actividad 
          WHERE t.estado_pago = 'pagado'";
$result = mysqli_query($conexion, $query);

// Procesar resultados
while ($row = mysqli_fetch_assoc($result)) {
    $total_recaudado += $row['Monto'];
    if ($row['tipo_pago'] == 'cuota') $total_cuotas += $row['Monto'];
    if ($row['tipo_pago'] == 'alquiler') $total_alquileres += $row['Monto'];
    if ($row['es_socio']) $total_socios += $row['Monto'];
    else $total_no_socios += $row['Monto'];
}

// Calcular porcentajes
$porcentaje_cuotas = ($total_recaudado > 0) ? ($total_cuotas * 100 / $total_recaudado) : 0;
$porcentaje_alquileres = ($total_recaudado > 0) ? ($total_alquileres * 100 / $total_recaudado) : 0;
$porcentaje_socios = ($total_recaudado > 0) ? ($total_socios * 100 / $total_recaudado) : 0;
$porcentaje_no_socios = ($total_recaudado > 0) ? ($total_no_socios * 100 / $total_recaudado) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recaudación - FomentAR</title>
    <link rel="stylesheet" href="./Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">
    <link rel="icon" type="image/png" href="./Images/logo-negro.png">
    <link rel="icon" type="image/png" href="./Images/logo-blanco.png" media="(prefers-color-scheme:dark)">
    <style>
        .stats-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            margin-bottom: 20px;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .progress {
            height: 10px;
            border-radius: 5px;
        }
        .stats-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .card-value {
            font-size: 1.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar existente -->
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

    <div class="container mt-4">
        <h2 class="mb-4">Panel de Recaudación</h2>
        
        <!-- Tarjeta principal de recaudación total -->
        <div class="card stats-card bg-primary text-white mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h5 class="card-title">Recaudación Total</h5>
                        <h2 class="card-value">$<?php echo number_format($total_recaudado, 2, ',', '.'); ?></h2>
                    </div>
                    <div class="col-md-3 text-right">
                        <i class="material-icons stats-icon">attach_money</i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjetas de estadísticas -->
        <div class="row">
            <!-- Tarjeta de Cuotas -->
            <div class="col-md-6 col-xl-3">
                <div class="card stats-card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Cuotas</h5>
                        <h3 class="card-value">$<?php echo number_format($total_cuotas, 2, ',', '.'); ?></h3>
                        <div class="progress bg-light mt-3">
                            <div class="progress-bar bg-white" role="progressbar" 
                                 style="width: <?php echo $porcentaje_cuotas; ?>%" 
                                 aria-valuenow="<?php echo $porcentaje_cuotas; ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <small class="mt-2 d-block"><?php echo number_format($porcentaje_cuotas, 1); ?>% del total</small>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Alquileres -->
            <div class="col-md-6 col-xl-3">
                <div class="card stats-card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Alquileres</h5>
                        <h3 class="card-value">$<?php echo number_format($total_alquileres, 2, ',', '.'); ?></h3>
                        <div class="progress bg-light mt-3">
                            <div class="progress-bar bg-white" role="progressbar" 
                                 style="width: <?php echo $porcentaje_alquileres; ?>%" 
                                 aria-valuenow="<?php echo $porcentaje_alquileres; ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <small class="mt-2 d-block"><?php echo number_format($porcentaje_alquileres, 1); ?>% del total</small>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Socios -->
            <div class="col-md-6 col-xl-3">
                <div class="card stats-card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Pagos de Socios</h5>
                        <h3 class="card-value">$<?php echo number_format($total_socios, 2, ',', '.'); ?></h3>
                        <div class="progress bg-light mt-3">
                            <div class="progress-bar bg-dark" role="progressbar" 
                                 style="width: <?php echo $porcentaje_socios; ?>%" 
                                 aria-valuenow="<?php echo $porcentaje_socios; ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <small class="mt-2 d-block"><?php echo number_format($porcentaje_socios, 1); ?>% del total</small>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de No Socios -->
            <div class="col-md-6 col-xl-3">
                <div class="card stats-card bg-secondary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Pagos de No Socios</h5>
                        <h3 class="card-value">$<?php echo number_format($total_no_socios, 2, ',', '.'); ?></h3>
                        <div class="progress bg-light mt-3">
                            <div class="progress-bar bg-white" role="progressbar" 
                                 style="width: <?php echo $porcentaje_no_socios; ?>%" 
                                 aria-valuenow="<?php echo $porcentaje_no_socios; ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <small class="mt-2 d-block"><?php echo number_format($porcentaje_no_socios, 1); ?>% del total</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <?php include "./scripts.php"; ?>
</body>
</html>