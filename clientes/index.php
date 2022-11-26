<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
//? VARIABLES GLOBALES ?????
$varsesion = $_SESSION['usuario'];
$rol = $_SESSION['id_rol'];

if ($varsesion == null || $varsesion = '') {
    header("location: ./errors/error_nologueado");
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
    <title>Document</title>
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
                <!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Eventos
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../eventos">Este mes</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="./historico">Historico</a>
					</div>
				</li>
			-->
                <!-- <li class="nav-item">
					<?php
$varsesion = $_SESSION['usuario'];
if ($varsesion == "presidente") {
    echo "	<a class='nav-link' href='../recaudacion_total'>Recaudacion</a>";
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
    <div class="botones">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Agregar nuevo
        </button>
    </div>
    <div class="contenedor">
        <div class="table-responsive p-2" class="w-100">
            <table id="example" class="table table-responsive display" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Domicilio</th>
                        <th>DNI</th>
                        <th>Fecha_nacimiento</th>
                        <th>Fecha_ingreso</th>
                        <th>Sexo</th>
                        <th>Numero de socio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Domicilio</th>
                        <th>DNI</th>
                        <th>Fecha_nacimiento</th>
                        <th>Fecha_ingreso</th>
                        <th>Sexo</th>
                        <th>Numero de socio</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
$clientes = "SELECT *
FROM
	clientes";
$resClientes = mysqli_query($conexion, $clientes);

while ($mostrar = mysqli_fetch_array($resClientes)) {
    $Fecha_nacimiento = date("d/m/Y", strtotime($mostrar['fecha_nacimiento']));
    $Fecha_ingreso = date("d/m/Y", strtotime($mostrar['fecha_ingreso']));
    echo '<tr>

					<td style="text-transform:capitalize;">' . $mostrar['nombre'] . '</td>
					<td style="text-transform:capitalize;">' . $mostrar['apellido'] . '</td>
					<td style="text-transform:capitalize;">' . $mostrar['domicilio'] . '</td>
					<td>' . $mostrar['DNI'] . '</td>
					<td>' . $Fecha_nacimiento . '</td>
				<td>' . $Fecha_ingreso . '</td>
					<td style="text-transform:capitalize;">' . $mostrar['genero_descripcion'] . '</td>
					<td>' . (($mostrar['num_socio']) ? $mostrar['num_socio'] : "No es socio") . '</td>
                 <td  style="display: flex;justify-content: space-between;margin: 0 auto;">
<a class="btn btn-warning m-1" href="./clientes_info?id=' . $mostrar['id'] . '" data-toggle="tooltip" role="button" title="INFO"><i class="material-icons">find_in_page</i></a>
					<a class="btn btn-warning m-1" href="../edit/modificar5?id=' . $mostrar['id'] . '" data-toggle="tooltip" role="button" title="Editar"><i class="material-icons">edit</i></a>
                    </td>

					</tr>';
}
?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal hide fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo socio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formlogin">
                        <form action="registrar_cliente.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" class="form-control" placeholder="Domicilio" name="domicilio"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">num Domicilio</label>
                                <input type="number" class="form-control" placeholder="num_domicilio"
                                    name="num_domicilio" id="cantidad" required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">telefono</label>
                                <input type="number" class="form-control" placeholder="telefono" name="telefono"
                                    id="cantidad" required>
                            </div>
                            <div class="form-group">
                                <label for="DNI">DNI</label>
                                <input type="number" class="form-control" placeholder="DNI" name="DNI" id="cantidad"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="DNI">EDAD</label>
                                <input type="number" class="form-control" placeholder="EDAD" name="edad" id="cantidad"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" max="3000-12-31" min="1000-01-01"
                                    class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de ingreso</label>
                                <input type="date" name="fecha_ingreso" max="3000-12-31" min="1000-01-01"
                                    class="form-control" placeholder="Fecha de ingreso" name="fecha_ingreso" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">¿Es socio?</label>
                                <input type="number" class="form-control" placeholder="numero o vacio" name="num_socio"
                                    id="cantidad">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Sexo</label>
                                <select simple class="form-control" id="exampleFormrControlSelect" name="Sexo" required>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control js-example-basic-multiple" name="actividades[]"
                                    multiple="multiple" style="width:100%;" id="mySelect2" lang="es">
                                    <option value="1">Basquet</option>
                                    <option value="2">Futbol</option>
                                    <option value="8">Voley</option>
                                    <option value="11">Patin</option>
                                    <option value=16">Taekwondo</option>
                                    <option value="18">Arte</option>
                                </select>
                            </div>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="btn btn-secondary float-right"
                                data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-primary" name="submit" value="Registrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <?php include "../scripts.php";?>
    <script src="../js/select2.min.js"></script>
    <script>
    $.fn.select2.defaults.set("language", "es");
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};
    $(document).ready(function() {
        $('#mySelect2').select2({
            dropdownParent: $('#exampleModalCenter .modal-content'),
            language: "es",
            placeholder: 'Seleccione una o varias actividades',
            theme: 'classic',
        });
    });
    </script>
</body>

</html>