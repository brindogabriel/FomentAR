<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
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
                    <a class='nav-link' href='./'>Eventos</a>
                </li>

                <li class="nav-item">
                    <?php
                    $varsesion = $_SESSION['usuario'];
                    $rol = $_SESSION['idRole'];
                    if ($varsesion == 1) {
                        echo "	<a class='nav-link' href='../recaudacion_total'>Recaudacion</a>";
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
    <div class="contenedor1" style="padding:2%;">
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
                <caption>Lista de eventos | si no puede eliminar un evento, comuniquese con el superior o con el
                    administrador del sistema</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha fin</th>
                        <th scope="col">estado</th>
                        <th scope="col">IMPORTE</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../database/conexion.php";
                    $sql = "SELECT eve.idevento,eve.nombre,eve.fecha_inicio,eve.fecha_fin,eve.estado,estado.descripcion,eve.importe from eventos eve, eventos_estado estado WHERE estado.estado = eve.estado;";

                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($result)) {
                        $dato2 = $mostrar['estado'];
                        $fecha_inicio = date("d/m/Y H:m", strtotime($mostrar['fecha_inicio']));
                        $fecha_fin = date("d/m/Y H:m", strtotime($mostrar['fecha_fin']));

                        //! calcular cuanto falta para el evento xd aunque podria ser desde el backend xd
                        $rol = $_SESSION['idRole'];


                        echo '<tr>					
					<td>' . $mostrar['nombre'] . '</td>
					<td>' . $fecha_inicio . '</td>
					<td>' . $fecha_fin  . '</td>
					<td>' . $mostrar['descripcion'] . '</td>
					<td>$ ' . $mostrar['importe']  . '</td>
                    <td>
                    <a class="btn btn-warning m-1" href="./modificar_evento?idevento=' . $mostrar['idevento'] . '" data-toggle="tooltip" role="button" title="Editar"><i class="material-icons">edit</i></a>

                    <a class="btn btn-primary m-1"  data-toggle="tooltip" role="button" title="Falta ' . $mostrar['estado'] . ' tiempo"><i class="material-icons" style="color:white;">alarm</i></a>

                    ' . (($rol == 1) ? '<a class="btn btn-danger m-1" href="./borrar_evento?idevento=' . $mostrar['idevento'] . '" data-toggle="tooltip" role="button" title="Dar De Baja"><i class="material-icons">delete</i></a>' : '<a class="btn btn-danger m-1 disabled" href="./borrar_evento?idevento=' . $mostrar['idevento'] . '" data-toggle="tooltip" role="button" title="Dar De Alta"><i class="material-icons">delete</i></a>') . '</td>
                    
					</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div class="botones">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                    style="float: right;">
                    Agregar nuevo
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="formlogin">
                                <form action="registrar_evento.php" method="POST">
                                    <div class="form-group">
                                        <label for="user">Nombre</label>
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre"
                                            required>
                                    </div>
                                    <!-- <div class="form-group">
                                    <label for="user">N° Matricula</label>
                                    <input type="number" class="form-control" placeholder="N° Matricula" name="nombre" id="cantidad" required>
                                </div> -->
                                    <div class="form-group">
                                        <label>Fecha de alquiler</label>
                                        <input type="datetime-local" name="fecha_inicio" class="form-control"
                                            placeholder="Fecha de alquiler" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Dura hasta</label>
                                        <input type="datetime-local" name="fecha_fin" class="form-control"
                                            placeholder="Fecha de alquiler" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="user">importe</label>
                                        <input type="number" class="form-control" placeholder="Nombre" name="importe"
                                            required>
                                    </div>
                                    <div class="dropdown-divider mb-2"></div>
                                    <button type="button" class="btn btn-secondary w-25 float-right"
                                        data-dismiss="modal">Cancelar</button>
                                    <input type="submit" class="btn btn-primary w-50" name="submit" value="Registrar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
        <?php include("../scripts.php"); ?>
</body>

</html>