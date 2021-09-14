<?php 
session_start();
session_destroy();
?>
<!doctype html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="./Imagenes/logo.png" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../CosasParaQueFuncioneSinInternet/bootstrap.css">
	<link rel="stylesheet" href="general.css">

	<title>FomentAR</title>
</head>
<body>
	<div class="contenedor-login">
		<div class="form-login">
			<img src="Imagenes/login.ico" alt="" class="rounded-circle">
			<form action="validar.php" method="post" class="w-100 p-0">
				<div class="form-group w-100">
					<input type="text" class="form-control w-100" placeholder="Usuario" name="nombre" required id="nombre">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña" data-toggle="tooltip" class="w-20">
						</div>
					</div>

					<input type="password" class="form-control w-80" id="myInput" placeholder="Contraseña" name="password">
				</div>
				<input type="submit" name="submit" class="btn btn-primary w-100 " value="Ingresar">
			</form>
		</div>
	</div>
</body>
<?php include 'scripts.php'; ?>