<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}
$conexion = mysqli_connect("localhost", "root", "", "fomentar");
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
                        echo "	<a class='nav-link' href='../recaudacion'>Recaudacion</a>";
                    }
                    ?>							
				</li> -->
                <!-- <li class="nav-item">
					<a class='nav-link' href='../reporte_errores'>Reporte Errores</a>
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
            <a class="btn btn-outline-danger" href="../database/cerrar_sesion" role="button">Cerrar sesión</a>
        </div>
    </nav>
    <div class="botones">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Agregar nuevo
        </button>
    </div>
    <div class="contenedor">
        <div class="table-responsive" class="w-100">
            <table id="table_id" class="table display AllDataTables" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">N° Matricula</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Nacionalidad</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Socio</th>
                        <th scope="col">Activades</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../database/conexion.php";
                    $sql = "SELECT * FROM clientes";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                        $dato = $mostrar['idParametro_Socio'];
                        $dato2 = $mostrar['idEstado'];
                        $dato3 = $mostrar['idCategoria'];
                        $dato4 = $mostrar['idSexo'];
                        $Fecha_nacimiento = date("d/m/Y", strtotime($mostrar['Fecha_nacimiento']));
                        $Fecha_ingreso = date("d/m/Y", strtotime($mostrar['Fecha_ingreso']));
                        echo '<tr>
					<td>' . $mostrar['Nro_orden'] . '</td>
					<td>' . $mostrar['Apellido'] . '</td>
					<td>' . $mostrar['Nombre'] . '</td>
					<td>' . $mostrar['Domicilio'] . '</td>
					<td>' . $mostrar['DNI'] . '</td>
					<td>' . $Fecha_nacimiento . '</td>
					<td>' . $Fecha_ingreso . '</td>
					<td>' . $mostrar['idParametro_Socio'] . '</td>
					<td>' . (($dato2 === "1") ? 'Activo' : 'Inactivo') . '</td>
					<td>' . $mostrar['idCategoria'] . '</td>
					<td>' . $mostrar['idSexo'] . '</td>
					<td scope="col" style="display: flex;justify-content: space-between;margin: 0 auto;">

					<a class="btn btn-warning m-1" href="../edit/modificar5?DNI=' . $mostrar['DNI'] . '" data-toggle="tooltip" role="button" title="Editar"><i class="material-icons">edit</i></a>

					' . (($dato2 === "1") ? '<a class="btn btn-danger m-1" href="./dar_de_baja?DNI=' . $mostrar['DNI'] . '" data-toggle="tooltip" role="button" title="Dar De Baja"><i class="material-icons">delete</i></a>' : '<a class="btn btn-success m-1" href="./dar_de_alta?DNI=' . $mostrar['DNI'] . '" data-toggle="tooltip" role="button" title="Dar De Alta"><i class="material-icons">restore</i></a>') . '</td>

					</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formlogin">
                        <form action="registrar_cliente.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="n_matricula">N° Matricula</label>
                                <input type="number" class="form-control" placeholder="N° Matricula" name="n_matricula"
                                    id="cantidad" required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" class="form-control" placeholder="Domicilio" name="domicilio"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="user">DNI</label>
                                <input type="number" class="form-control" placeholder="DNI" name="dni" id="cantidad"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input type="number" class="form-control" placeholder="Edad" name="edad" id="cantidad"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="Estado">Estado</label>
                                <input type="number" class="form-control" placeholder="estado" name="estado"
                                    id="cantidad" required>
                            </div>
                            <div class="form-group">
                                <label for="nacionalidad">Nacionalidad</label>
                                <input type="text" class="form-control" placeholder="Nacionalidad" name="nacionalidad"
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
                                <label for="exampleFormControlSelect">¿Es Socio?</label>
                                <select simple class="form-control" id="exampleFormControlSelect" name="socio" required>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Actividad</label>
                                <select multiple class="form-control" id="exampleFormControlSelect2"
                                    name="actividades[]" required>
                                    <option value="basquet">Basquet</option>
                                    <option value="patin">Patín</option>
                                    <option value="futbol">Futbol</option>
                                    <option value="arte">Arte</option>
                                    <option value="taekwondo">Taekwondo</option>
                                    <option value="voley">Voley</option>
                                </select>
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
    <?php include '../scripts.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>

</html>