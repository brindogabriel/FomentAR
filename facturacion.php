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
    <div class="contenedor">
        <div class="table-responsive" class="w-100">
            <table id="example" class="table table-responsive w-100" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>actividad</th>
                        <th>fecha</th>
                       <th>saldo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <th>nombre</th>
                        <th>actividad</th>
                        <th>fecha</th>
                       <th>saldo</th>
                    </tr>
                </tfoot>
                <tbody>

               <?php
$resfact = mysqli_query($conexion, "SELECT c.id_cliente, c.nombre AS nombre_cliente, act.id_actividad, act.nombre_actividad, fact.PersonaID, fact.ActividadID, fact.SaldoActual, fact.fechaTransaccion FROM Transacciones fact JOIN clientes c ON c.id_cliente = fact.PersonaID JOIN actividades act ON act.id_actividad = fact.ActividadID;");

while ($mostrar = mysqli_fetch_array($resfact)) {
    // Aplicar estilos según el valor del saldo
    $estilo_fondo = $mostrar['SaldoActual'] >= 0 ? 'background-color: green;' : 'background-color: red;';

    echo '<tr style="' . $estilo_fondo . '">
        <td>' . $mostrar['nombre_cliente'] . '</td>
        <td>' . $mostrar['nombre_actividad'] . '</td>
        <td>' . $mostrar['fechaTransaccion'] . '</td>
        <td>' . $mostrar['SaldoActual'] . '</td>
    </tr>';
}
?>
                    
                </tbody>
            </table>
        </div>
    </div>

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>

</html>