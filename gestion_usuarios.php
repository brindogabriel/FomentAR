<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion= '') {
	header("location: ./errors/error_nologueado");
	die();
}
$conexion=mysqli_connect("localhost","root","","fomentar");
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
						echo "	<a class='nav-link' href='./recaudacion_total'>Recaudacion</a>";
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
    <?php
$varsesion = $_SESSION['usuario'];
if ($varsesion == "usuario" ) {
	header("location: ./error_privilegio");
	die();
}
?>
    <div class="general">
        <div class="contenedor1">
            <div class="table-responsive">
                <table id="table_id" class="table display AllDataTables" width="100%" cellspacing="0">
                    <caption>Lista de usuarios</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <?php 
				$sql ="SELECT * FROM usuarios";
				$result=mysqli_query($conexion,$sql);
				while ($mostrar=mysqli_fetch_array($result)) {
					?>
                    <tbody>
                        <tr>
                            <td scope="col"><?php echo $mostrar['Usuario'] ?></td>
                            <td scope="col"><?php echo $mostrar['Password'] ?></td>
                            <td scope="col"><?php echo $mostrar['idRole'] ?></td>
                            <td scope="col"><?php echo "
							<a class='btn btn-warning' href='./modificar?Usuario=".$mostrar['Usuario']."' data-toggle='tooltip' role='button' title='Editar'><i class='material-icons'>
							edit
							</i></a>
							<a class='btn btn-danger' href='./borrar_usuario?Usuario=".$mostrar['Usuario']."'data-toggle='tooltip' role='button' title='Dar de baja'><i class='material-icons'>
							delete
							</i></a>
							"; ?></td>
                        </tr>
                        <?php 
					}
					?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary float-right mt-2" data-toggle="modal"
                data-target="#exampleModalCenter">
                Agregar nuevo
            </button>
        </div>
        <!-- Button trigger modal -->

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formlogin">
                        <form action="registrar.php" method="post">
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <input type="text" class="form-control" placeholder="Usuario" name="nombre" id="user"
                                    required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña">
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="myInput" placeholder="Contraseña"
                                    name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo De Usuario</label>
                                <?php
							include 'conexion.php';

							$consulta="SELECT Usuario, idRole FROM `usuarios`";
							$result=mysqli_query($conexion,$consulta);
							$bandera = true;
							?>

                                <!-- en lugar del div.cajaselect -->
                                <select class="form-control" id="exampleFormControlSelect1" name="tipo">
                                    <?php
								while ($filas=mysqli_fetch_array($result)) {
					$id_dato = $filas['idRole']; // guarda el id del registro
					$dato = $filas['Usuario']; // guarda el dato del registro
					?>
                                    <!-- en el value se inyecta el id, con la bandera se verifica que sea la primera iteracion del bucle -->
                                    <option value="<?php echo $tipo; ?>"
                                        <?php echo ($bandera == true) ? "selected" : ""; ?> required>
                                        <?php echo $dato; /* imprime el sector en el option */ ?>
                                    </option>
                                    <?php
     $bandera = false; // cambia el valor de la bandera para no seleccionar nada en la siguiente iteración
 }
 ?>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <?php include './scripts.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>

</html>