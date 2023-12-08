<?php
session_start();
error_reporting(0); 
//? VARIABLES GLOBALES ?????
$varsesion = $_SESSION['usuario'];
$rol = $_SESSION['id_rol'];

if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}
include '..\database\conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Resources/material-icons.css">
    <link href="../css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/select2-bootstrap4.min.css">
    <title>FomentAR</title>
    <link rel="stylesheet" href="./fullcalendar/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./main.min.css">
</head>

<body>

    <?php
    require_once('../database/conexion.php');

    $schedules = $conexion->query("SELECT * FROM `schedule_list`");
    $sched_res = [];

    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }

    if (isset($conexion))
        $conexion->close();
    ?>
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
                <li class="nav-item ">
                    <a class="nav-link" href="../pagina_principal">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='../clientes'>Todos los Clientes</a>
                </li>
                <li class="nav-item active">
                    <a class='nav-link' href='../eventos'>Eventos</a>
                </li>
                <?php
                if ($rol == 1) {
                    echo "<li class='nav-item'>
                        <a class='nav-link' href='../recaudacion'>Recaudacion</a>
                        </li>";
                }
                ?>
                <li class="nav-item">
                    <a class='nav-link' href='../reporte_errores'>Reporte Errores</a>
                </li>
                <?php
                if ($rol == 1) {
                    echo "<li class='nav-item'>
                        <a class='nav-link' href='../gestion_usuarios'>Gestion de usuarios</a>
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
            <a class="btn btn-outline-danger" href="../database/cerrar_sesion" role="button">Cerrar sesión</a>
        </div>
    </nav>
    <div class="container py-5  mt-4" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar" class="shadow p-3 bg-light"></div>
            </div>
            <div class="col-md-3 ">
                <div class="card rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Agregar Evento</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Titulo</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title"
                                        id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Descripcion</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description"
                                        id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Comienzo</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">Fin</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="end_datetime" id="end_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="priority">Prioridad</label>
                                    <select class="form-control form-control-sm rounded-0" name="color" id="color"
                                        required>
                                        <option value="" selected disabled>Seleccionar una opcion</option>
                                        <option value="#dc3545">Muy Importante</option>
                                        <option value="#007bff">Normal</option>
                                    </select>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i
                                    class="fa fa-save mr-2"></i>Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i
                                    class="fa fa-reset mr-2"></i>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detalles de evento</h5>


                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>



                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <p><strong>Título:</strong> <span id="title"></span></p>
                        <p><strong>Descripción:</strong> <span id="description"></span></p>
                        <p><strong>Fecha de inicio:</strong> <span id="start"></span></p>
                        <p><strong>Fecha de finalización:</strong> <span id="end"></span></p>
                        <p><strong>Prioridad:</strong> <span id="priority"></span></p>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit"
                            data-id="">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                            data-id="">Borrar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="./bootstrap.bundle.min.js"></script>
    <script src="./main.min.js"></script>
    <script src="script.js"></script>
    <script src="./moment.js"></script>
    <script src='./index.global.min.js'></script>
    <script src="./locales-all.global.min.js"></script>
    <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>

</body>

</html>