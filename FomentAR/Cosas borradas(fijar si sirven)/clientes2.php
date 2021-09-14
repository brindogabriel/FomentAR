<?php include("./nav_externo.php");?>
<div class="container-fluid">
	<div class="buscar-usuarios">
		<form action="buscar_cliente.php" method="post">
			Buscar: <input name="palabra">
			<input type="submit" name="buscador" value="Buscar">
		</form>
	</div>
	<div class="row">
		<div class="col">
			<div class="card" style="width: 18rem;">
				<a href="futbol.html"><img class="card-img-top" src="./Imagenes/basquet.jpg" alt="Card image cap"></a>
				<div class="card-body">
					<h5 class="card-title">Gabriel</h5>
					<p class="card-text">
						<a href="#" class="badge badge-dark">Futbol</a>
						<a href="#" class="badge badge-danger">Taekwondo</a>
					</p>
					<a href="futbol.html" class="btn btn-secondary">Ver + info</a>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card" style="width: 18rem;">
				<a href="futbol.html"><img class="card-img-top" src="./Imagenes/basquet.jpg" alt="Card image cap"></a>
				<div class="card-body">
					<h5 class="card-title">Cristian</h5>
					<p class="card-text">
						<a href="#" class="badge badge-dark">Futbol</a>
						<a href="#" class="badge badge-warning">Basquet</a>
					</p>
					<a href="futbol.html" class="btn btn-secondary">Ver + info</a>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card" style="width: 18rem;">
				<a href="futbol.html"><img class="card-img-top" src="./Imagenes/basquet.jpg" alt="Card image cap"></a>
				<div class="card-body">
					<h5 class="card-title">Marcelo</h5>
					<p class="card-text">
						<a href="#" class="badge badge-success">Arte</a>
						<a href="#" class="badge badge-danger">Taekwondo</a>
					</p>
					<a href="futbol.html" class="btn btn-secondary">Ver + info</a>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card" style="width: 18rem;">
				<a href="futbol.html"><img class="card-img-top" src="./Imagenes/basquet.jpg" alt="Card image cap"></a>
				<div class="card-body">
					<h5 class="card-title">Facundo</h5>
					<p class="card-text">
						<a href="#" class="badge badge-dark">Futbol</a>

						<a href="#" class="badge badge-success">Arte</a>
					</p>
					<a href="futbol.html" class="btn btn-secondary">Ver + info</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'scripts.php'; ?>