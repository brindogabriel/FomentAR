<?php include("./nav_externo.php");?>
<div class="contenedor1">
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<caption>Lista de eventos</caption>
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">First</th>
					<th scope="col">Last</th>
					<th scope="col">Handle</th>
					<th scope="col">Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td><button type="button" class="btn btn-primary"  data-toggle="tooltip" title="Falta X tiempo"><i class="material-icons">
						alarm
					</i></button>
					<button type="button" class="btn btn-success"  data-toggle="tooltip" title="Finalizado"><i class="material-icons">
						done
					</i></button>
					<button type="button" class="btn btn-warning"  data-toggle="tooltip" title="En curso"><i class="material-icons">
						history
					</i></button>
				</button>
				<button type="button" class="btn btn-danger"  data-toggle="tooltip" title="Anular"><i class="material-icons">
					delete
				</i></button></td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				<td><button type="button" class="btn btn-primary"  data-toggle="tooltip" title="Falta X tiempo"><i class="material-icons">
					alarm
				</i></button>
				<button type="button" class="btn btn-success"  data-toggle="tooltip" title="Finalizado"><i class="material-icons">
					done
				</i></button>
				<button type="button" class="btn btn-warning"  data-toggle="tooltip" title="En curso"><i class="material-icons">
					history
				</i></button>
			</button>
			<button type="button" class="btn btn-danger"  data-toggle="tooltip" title="Anular"><i class="material-icons">
				delete
			</i></button></td>
		</tr>
		<tr>
			<th scope="row">3</th>
			<td>Larry</td>
			<td>the Bird</td>
			<td>@twitter</td>
			<td><button type="button" class="btn btn-primary"  data-toggle="tooltip" title="Falta X tiempo"><i class="material-icons">
				alarm
			</i></button>
			<button type="button" class="btn btn-success"  data-toggle="tooltip" title="Finalizado"><i class="material-icons">
				done
			</i></button>
			<button type="button" class="btn btn-warning"  data-toggle="tooltip" title="En curso"><i class="material-icons">
				history
			</i></button>
			<button type="button" class="btn btn-danger"  data-toggle="tooltip" title="Anular"><i class="material-icons">
				delete
			</i></button></td>
		</tr>
	</tbody>
</table>
</div>
<!-- Button trigger modal -->
<div class="botones">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
		Agregar nuevo
	</button>
</div>	
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Evento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="formlogin">
					<form action="registrar.php" method="post">
						<div class="form-group">
							<label for="user">Nombre</label>
							<input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
						</div>
						<div class="form-group">
							<label for="user">N° Matricula</label>
							<input type="number" class="form-control" placeholder="N° Matricula" name="nombre" id="cantidad" required>
						</div>
						<div class="form-group">
							<label>Fecha de alquiler</label>
							<input type="date" name="Fecha de alquiler" max="3000-12-31" 
							min="1000-01-01" class="form-control" placeholder="Fecha de alquiler" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" type="submit" name="submit">Registrar</button>
				</div>
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
<script>$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

</script>
</body>
</html>