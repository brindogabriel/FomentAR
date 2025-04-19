<?php
session_start();

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
                <!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Eventos
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="./eventos">Este mes</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="./historico">Historico</a>
					</div>
				</li>
			-->
                <!-- <li class="nav-item">
					<?php
                    $varsesion = $_SESSION['usuario'];
                    if ($varsesion == "presidente") {
                        echo "	<a class='nav-link' href='./recaudacionl'>Recaudacion</a>";
                    }
                    ?>							
				</li> -->
                <!-- <li class="nav-item">
					<a class='nav-link' href='./reporte_errores'>Reporte Errores</a>
				</li> -->
                <li class="nav-item">
                    <?php
                    $varsesion = $_SESSION['usuario'];
                    if ($varsesion == "presidente") {
                        echo "	<a class='nav-link' href='./gestion_usuarios'>Gestion de usuarios</a>";
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
            <a class="btn btn-outline-danger" href="./database/cerrar_sesion" role="button">Cerrar sesión</a>
        </div>
    </nav>
     <div class="botones">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPago">
            Registrar nuevo pago
        </button>
    </div>
    <div class="contenedor">
       

        <div class="table-responsive p-2" class="w-100">
            <table id="example" class="table table-responsive display" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Actividad</th>
                        <th>Fecha</th>
                        <th>Tipo de pago</th>
                        <th>Estado de pago</th>
                        <th>¿Es socio?</th>
                        <th>Monto</th>
                        <th>Saldo actual</th>
                    </tr>
                </thead>
                <tfoot class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Actividad</th>
                        <th>Fecha</th>
                        <th>Tipo de pago</th>
                        <th>Estado de pago</th>
                        <th>¿Es socio?</th>
                        <th>Monto</th>
                        <th>Saldo actual</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                $resfact = mysqli_query($conexion, "SELECT c.nombre, c.apellido, act.nombre_actividad, fact.FechaTransaccion, fact.tipo_pago, fact.estado_pago, fact.es_socio, fact.Monto, fact.SaldoActual FROM Transacciones fact JOIN clientes c ON c.id_cliente = fact.PersonaID JOIN actividades act ON act.id_actividad = fact.ActividadID ORDER BY fact.FechaTransaccion DESC, fact.TransaccionID DESC;");
                while ($mostrar = mysqli_fetch_array($resfact)) {
                    $estilo_fondo = $mostrar['SaldoActual'] >= 0 ? 'background-color: #e6ffe6;' : 'background-color: #ffe6e6;';
                    echo '<tr style="' . $estilo_fondo . '">';
                    echo '<td style="text-transform:capitalize;">' . $mostrar['nombre'] . '</td>';
                    echo '<td style="text-transform:capitalize;">' . $mostrar['apellido'] . '</td>';
                    echo '<td>' . $mostrar['nombre_actividad'] . '</td>';
                    echo '<td>' . date('d/m/Y', strtotime($mostrar['FechaTransaccion'])) . '</td>';
                    echo '<td style="text-transform:capitalize;">' . $mostrar['tipo_pago'] . '</td>';
                    echo '<td>' . ($mostrar['estado_pago'] == 'pagado' ? '<span class="badge badge-success">Pagado</span>' : '<span class="badge badge-danger">No pagado</span>') . '</td>';
                    echo '<td>' . ($mostrar['es_socio'] ? 'Sí' : 'No') . '</td>';
                    echo '<td>$' . number_format($mostrar['Monto'], 2, ',', '.') . '</td>';
                    echo '<td>$' . number_format($mostrar['SaldoActual'], 2, ',', '.') . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="modalPagoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPagoLabel">Registrar nuevo pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="persona_id">Cliente</label>
                                <select class="form-control" id="persona_id" name="persona_id" required>
                                    <option value="">Seleccione...</option>
                                    <?php
                                    $clientes = mysqli_query($conexion, "SELECT id_cliente, nombre, apellido FROM clientes");
                                    while ($cli = mysqli_fetch_array($clientes)) {
                                        echo '<option value="' . $cli['id_cliente'] . '">' . $cli['nombre'] . ' ' . $cli['apellido'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="actividad_id">Actividad</label>
                                <select class="form-control" id="actividad_id" name="actividad_id" required>
                                    <option value="">Seleccione...</option>
                                    <?php
                                    $actividades = mysqli_query($conexion, "SELECT id_actividad, nombre_actividad FROM actividades");
                                    while ($act = mysqli_fetch_array($actividades)) {
                                        echo '<option value="' . $act['id_actividad'] . '">' . $act['nombre_actividad'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="tipo_pago">Tipo de pago</label>
                                <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                                    <option value="cuota">Cuota</option>
                                    <option value="alquiler">Alquiler</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="estado_pago">Estado de pago</label>
                                <select class="form-control" id="estado_pago" name="estado_pago" required>
                                    <option value="pagado">Pagado</option>
                                    <option value="no pagado">No pagado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="es_socio">¿Es socio?</label>
                                <select class="form-control" id="es_socio" name="es_socio" required>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="monto">Monto</label>
                                <input type="number" step="0.01" class="form-control" id="monto" name="monto" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" name="registrar_pago">Registrar pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Procesar el formulario
    if (isset($_POST['registrar_pago'])) {
        $persona_id = mysqli_real_escape_string($conexion, $_POST['persona_id']);
        $actividad_id = mysqli_real_escape_string($conexion, $_POST['actividad_id']);
        $fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);
        $tipo_pago = mysqli_real_escape_string($conexion, $_POST['tipo_pago']);
        $estado_pago = mysqli_real_escape_string($conexion, $_POST['estado_pago']);
        $es_socio = mysqli_real_escape_string($conexion, $_POST['es_socio']);
        $monto = mysqli_real_escape_string($conexion, $_POST['monto']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        // Obtener el saldo anterior
        $res_saldo = mysqli_query($conexion, "SELECT SaldoActual FROM Transacciones WHERE PersonaID='$persona_id' ORDER BY FechaTransaccion DESC, TransaccionID DESC LIMIT 1");
        $saldo_anterior = 0;
        if ($row_saldo = mysqli_fetch_array($res_saldo)) {
            $saldo_anterior = $row_saldo['SaldoActual'];
        }
        // Si está pagado, sumar el monto al saldo, si no, dejar igual
        $saldo_nuevo = ($estado_pago == 'pagado') ? $saldo_anterior + $monto : $saldo_anterior;

        $sql = "INSERT INTO Transacciones (PersonaID, ActividadID, FechaTransaccion, Descripcion, Monto, TipoTransaccion, SaldoActual, tipo_pago, estado_pago, es_socio)
                VALUES ('$persona_id', '$actividad_id', '$fecha', '$descripcion', '$monto', '$tipo_pago', '$saldo_nuevo', '$tipo_pago', '$estado_pago', '$es_socio')";
        if (mysqli_query($conexion, $sql)) {
            echo '<div class="alert alert-success mt-3">Pago registrado correctamente.</div>';
            echo '<meta http-equiv="refresh" content="1">';
        } else {
            echo '<div class="alert alert-danger mt-3">Error al registrar el pago: ' . mysqli_error($conexion) . '</div>';
        }
    }
    ?>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <?php include "./scripts.php"; ?>
    <script src="../js/select2.min.js"></script>
    <script>
    $.fn.select2.defaults.set("language", "es");
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};
    $(document).ready(function() {
        $('#mySelect2').select2({
            dropdownParent: $('#exampleModalCenter .modal-content'),
            language: "es",
            placeholder: 'Seleccione una o varias actividades',

        });
    });
    </script>
    <script src="../js/script.js"></script>
    </div>
    </div>
    </div>
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src='./Resources\DataTables\DataTables-1.10.18\js\jquery.dataTables.min.js'></script>
    <script src='./Resources\DataTables\DataTables-1.10.18\js\dataTables.bootstrap.min.js'></script>
    <link rel="stylesheet" type="text/css" href="./Resources/DataTables/datatables.min.css" />
    <script type="text/javascript" src="./Resources/DataTables/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Próximo",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar orden de columna ascendente",
                    "sortDescending": ": Activar orden de columna desendente"
                }
            }
        });
    });
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>

</html>