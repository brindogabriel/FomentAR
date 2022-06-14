<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion= '') {
	header("location: ./errors/error_nologueado");
	die();
}
$conexion=mysqli_connect("localhost","root","","fomentar");

$consulta=ConsultarProducto($_GET['id']);

function ConsultarProducto( $id )
{
	$conexion=mysqli_connect("localhost","root","","fomentar");
	$sentencia="SELECT * FROM usuarios WHERE id='".$id."' ";
	$resultado= $conexion->query($sentencia) or die ("Error al consultar producto".mysqli_error($conexion)); 
	$fila=$resultado->fetch_assoc();

	return [
		$fila['usuario'],
		$fila['password'],
		$fila['tipo'],
	];
}
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
    <div class="form-login">
        <form action="modificar4.php" method="post">
            <div class="form-group">
                <input type="hidden" name="tipo" value="<?php echo $_GET['tipo']?>">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" placeholder="Usuario" name="nombre"
                    value="<?php echo $consulta[0] ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña">
                    </div>
                </div>
                <input type="password" class="form-control" id="myInput" placeholder="Contraseña" name="password"
                    value="<?php echo $consulta[1] ?>">
            </div>
            <div class="form-group">
                <select name="cbx_estado" id="cbx_estado" class="form-control">
                    <option value="0">Tipo de usuario</option>
                    <?php
					$conexion=mysqli_connect("localhost","root","","fomentar");
					$consulta="SELECT id, tipo FROM `usuarios`";
					$resultado=mysqli_query($conexion,$consulta);
					while($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
        </form>
    </div>
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
</body>

</html>