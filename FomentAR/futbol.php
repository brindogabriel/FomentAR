<?php include("./nav_externo.php");?>
<link rel="stylesheet" href="../CosasParaQueFuncioneSinInternet/material-icons.css">

<meta charset="UTF-8">
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
					<th>Nro_orden</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>DNI</th>
					<th>Fecha_nacimiento</th>
					<th>Fecha_ingreso</th>
					<th>Parametro Socio</th>
					<th>Estado</th>
					<th>Categoria</th>
					<th>Sexo</th>
					<th>Opciones</th>

				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nro_orden</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>DNI</th>
					<th>Fecha_nacimiento</th>
					<th>Fecha_ingreso</th>
					<th>Parametro Socio</th>
					<th>Estado</th>
					<th>Categoria</th>
					<th>Sexo</th>
					<th>Opciones</th>

				</tr>
			</tfoot>
			<tbody>
				<?php 
				$conexion=mysqli_connect("localhost","root","","fomentar");
				$sql ="SELECT cli.nro_orden, cli.apellido, cli.nombre, cli.domicilio, cli.DNI, cli.fecha_nacimiento, cli.fecha_ingreso, dis.detalle, paramSoc.detallepar, est.Estado,cat.descripcion, sex.detallesex, est.idEstado
				from clientes cli,
				actividades act,
				disciplinas dis,
				parametro_Socio paramSoc,
				estado est,
				categorias cat,
				sexo sex
				where act.nro_orden = cli.nro_orden
				and paramSoc.idParametro_Socio = cli.idParametro_Socio and 
				est.idEstado = cli.idEstado and sex.idSexo = cli.idSexo and
				cat.idCategoria = cli.idCategoria
				and dis.idDisciplina = act.idDisciplina
				and dis.detalle = 'futbol'";

				$result=mysqli_query($conexion,$sql);
				while ($mostrar=mysqli_fetch_assoc($result)) {
					$dato2 = $mostrar['idEstado'];
					$Fecha_nacimiento = date("d/m/Y", strtotime($mostrar['fecha_nacimiento']));
					$Fecha_ingreso = date("d/m/Y", strtotime($mostrar['fecha_ingreso']));
					echo '<tr>
					<td>'.$mostrar['nro_orden'].'</td>
					<td>'.utf8_encode($mostrar['apellido']).'</td>
					<td>'.$mostrar['nombre'].'</td>
					<td>'.$mostrar['domicilio'].'</td>
					<td>'.$mostrar['DNI'].'</td>
					<td>'.$Fecha_nacimiento.'</td>
					<td>'.$Fecha_ingreso.'</td>
					<td>'.$dato = $mostrar['detallepar'].'</td>
					<td>'.$mostrar['Estado'].'</td>
					<td>'.$dato3 = $mostrar['detalle'].'</td>
					<td>'.$dato4 = $mostrar['detallesex'].'</td>
					<td scope="col" style="display: flex;justify-content: space-between;margin: 0 auto;">

					<a class="btn btn-warning m-1" href="./modificar5?DNI='.$mostrar['DNI'].'" data-toggle="tooltip" role="button" title="Editar"><i class="material-icons">edit</i></a>

					' . (($dato2=="1") ? '<a class="btn btn-danger m-1" href="./dar_de_baja?DNI='.$mostrar['DNI'].'" data-toggle="tooltip" role="button" title="Dar De Baja"><i class="material-icons">delete</i></a>' : '<a class="btn btn-success m-1" href="./dar_de_alta?DNI='.$mostrar['DNI'].'" data-toggle="tooltip" role="button" title="Dar De Alta"><i class="material-icons">restore</i></a>').'</td>

					</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
					<form action="registrar_futbol.php" method="post">
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
							<input type="text" class="form-control" placeholder="Domicilio" name="domicilio" required>
						</div>
						<div class="form-group">
							<label for="DNI">DNI</label>
							<input type="number" class="form-control" placeholder="DNI" name="DNI" id="cantidad" required>
						</div>
						<div class="form-group">
							<label for="fecha_nacimiento">Fecha de nacimiento</label>
							<input type="date" name="fecha_nacimiento" max="3000-12-31" 
							min="1000-01-01" class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento" required >
						</div>
						<div class="form-group">
							<label for="fecha_ingreso">Fecha de ingreso</label>
							<input type="date" name="fecha_ingreso" max="3000-12-31" 
							min="1000-01-01" class="form-control" placeholder="Fecha de ingreso" name="fecha_ingreso" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect">¿Es Socio?</label>
							<select simple class="form-control" id="exampleFormControlSelect" name="socio" required>
								<option value="1">Si</option>
								<option value="2">No</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect">Sexo</label>
							<select simple class="form-control" id="exampleFormrControlSelect" name="Sexo" required>
								<option value="1">Femenino</option>
								<option value="2">Masculino</option>
								<option value="3">transformista</option>
							</select>
						</div>
						<div class="dropdown-divider"></div>
						<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancelar</button>
						<input type="submit" class="btn btn-primary" name="submit" value="Registrar">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("./scripts.php");?>