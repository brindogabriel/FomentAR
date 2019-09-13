<?php include("./nav_externo.php");?>
<div class="container-fluid2">
	<div class="row">
		<div class="col w-20">
			<div class="card" style="width: 18rem;">
				<a href="futbol.html"><img class="card-img-top" src="./Imagenes/markus-spiske-771011-unsplash.jpg" alt="Card image cap"></a>
				<div class="card-body">
					<h5 class="card-title">Gabriel</h5>
					<p class="card-text">
						s
					</p>
					<a href="#" class="badge badge-dark">Futbol</a>
					<a href="#" class="badge badge-danger">Taekwondo</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row w-80">
		<div class="contenedor1">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<caption>Lista de Pagos</caption>
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Deporte</th>
							<th scope="col">Pago</th>
							<th scope="col">Fecha</th>
							<th scope="col">Estado</th>
							<th scope="col">Opciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td><a href="#" class="badge badge-dark">Futbol</a></td>
							<td>$500</td>
							<td>28/10/2018</td>
							<td><span class="badge badge-success">Al dia</span></td>
							<td><button type="button" class="btn btn-warning"  data-toggle="tooltip" title="Editar"><i class="material-icons">
								edit
							</i></button>
							<button type="button" class="btn btn-danger"  data-toggle="tooltip" title="Borrar"><i class="material-icons">
								delete
							</i></button></td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td><a href="#" class="badge badge-danger">Taekwondo</a></td>
							<td>$200</td>
							<td>27/10/2018</td>
							<td><span class="badge badge-danger">Debe $300</span></td>
							<td><button type="button" class="btn btn-warning"  data-toggle="tooltip" title="Editar"><i class="material-icons">
								edit
							</i></button>
							<button type="button" class="btn btn-danger"  data-toggle="tooltip" title="Borrar"><i class="material-icons">
								delete
							</i></button></td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
<?php include("./scripts.php");?>