<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="fomentar";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$nombre=$_POST['xnombre'];
// $carrera=$_POST['xcarrera'];
$limit=$_POST['xregistros'];

////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['xcarrera']))
	{
		$where="where nombre like '".$nombre."%'";
	}

	else if (empty($_POST['xnombre']))
	{
		$where="where carrera='".$carrera."'";
	}

	else
	{
		$where="where nombre like '".$nombre."%' and carrera='".$carrera."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$clientes="SELECT * FROM clientes $where $limit";
$resClientes=$conexion->query($clientes);
$resCarreras=$conexion->query($clientes);

if(mysqli_num_rows($resClientes)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

<head>
	<title>Filtro de Búsqueda PHP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<link href="css/estilos.css" rel="stylesheet">
	<link rel="stylesheet" href="../CosasParaQueFuncioneSinInternet/bootstrap-4.1.3-dist/css/bootstrap.css">

</head>
<body>
	<header>
		<div class="alert alert-info">
			<h2>Filtro de Búsqueda PHP</h2>
		</div>
	</header>
	<section>
		<form method="post">
			<input type="text" placeholder="Nombre..." name="xnombre"/>


			<select name="xregistros">
				<option value="">No. de Registros</option>
				<option value="limit 3">3</option>
				<option value="limit 6">6</option>
				<option value="limit 9">9</option>
			</select>
			<button name="buscar" type="submit">Buscar</button>
		</form>

		<?php

		while ($registroAlumnos = $resClientes->fetch_array(MYSQLI_BOTH))
		{

			echo'	<div class="card" style="width: 18rem;">
			<a href="futbol.html"><img class="card-img-top" src="./Imagenes/basquet.jpg" alt="Card image cap"></a>
			<div class="card-body">
			<h5 class="card-title"  style="text-transform: capitalize;">'.$registroAlumnos['Nombre'].'</h5>
			<p class="card-text">
			<a href="#" class="badge badge-dark">'.$registroAlumnos['idCategoria'].'</a>
			<a href="#" class="badge badge-danger">'.$registroAlumnos['Fecha_nacimiento'].'</a>
			</p>
			<a href="futbol.html" class="btn btn-secondary">Ver + info</a>
			</div>
			</div>';
		}
		?>
		
		<?
		echo $mensaje;
		?>
	</section>
</body>
</html>


