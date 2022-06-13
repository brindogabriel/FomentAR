<?php include("./nav_externo.php");?>
<?php 
include 'conexion.php';
$clientes = "SELECT * FROM clientes";
$resClientes=mysqli_query($conexion,$clientes);
?>
<link rel="stylesheet" href="../CosasParaQueFuncioneSinInternet/material-icons.css">

<meta charset="utf-8">
<!-- <div class="botones">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
		Agregar nuevo
	</button>
</div> -->
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
					<th>idParametro_Socio</th>
					<th>idEstado</th>
					<th>idCategoria</th>
					<th>idSexo</th>
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
					<th>idParametro_Socio</th>
					<th>idEstado</th>
					<th>idCategoria</th>
					<th>idSexo</th>
					<th>Opciones</th>

				</tr>
			</tfoot>
			<tbody>
				<?php 

				while ($mostrar=mysqli_fetch_array($resClientes)) {
					$dato = $mostrar['idParametro_Socio'];
					$dato2 = $mostrar['idEstado'];
					$dato3 = $mostrar['idCategoria'];
					$dato4 = $mostrar['idSexo'];
					$Fecha_nacimiento = date("d/m/Y", strtotime($mostrar['Fecha_nacimiento']));
					$Fecha_ingreso = date("d/m/Y", strtotime($mostrar['Fecha_ingreso']));
					echo '<tr>
					<td>'.$mostrar['Nro_orden'].'</td>
					<td>'.$mostrar['Apellido'].'</td>
					<td>'.$mostrar['Nombre'].'</td>
					<td>'.$mostrar['Domicilio'].'</td>
					<td>'.$mostrar['DNI'].'</td>
					<td>'.$Fecha_nacimiento.'</td>
					<td>'.$Fecha_ingreso.'</td>
					<td>'.$mostrar['idParametro_Socio'].'</td>
					<td>' . (($dato2==="1") ? 'Activo' : 'Inactivo').'</td>
					<td>'.$mostrar['idCategoria'].'</td>
					<td>'.$mostrar['idSexo'].'</td>
					<td scope="col" style="display: flex;justify-content: space-between;margin: 0 auto;">

					<a class="btn btn-warning m-1" href="../edit/modificar5?DNI='.$mostrar['DNI'].'" data-toggle="tooltip" role="button" title="Editar"><i class="material-icons">edit</i></a>

					' . (($dato2==="1") ? '<a class="btn btn-danger m-1" href="./dar_de_baja?DNI='.$mostrar['DNI'].'" data-toggle="tooltip" role="button" title="Dar De Baja"><i class="material-icons">delete</i></a>' : '<a class="btn btn-success m-1" href="./dar_de_alta?DNI='.$mostrar['DNI'].'" data-toggle="tooltip" role="button" title="Dar De Alta"><i class="material-icons">restore</i></a>').'</td>

					</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
							<label for="domicilio">Domicilio</label>
							<input type="text" class="form-control" placeholder="Domicilio" name="domicilio" required>
						</div>
						<div class="form-group">
							<label for="user">DNI</label>
							<input type="number" class="form-control" placeholder="DNI" name="dni" id="cantidad" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect3">Estado</label>
							<select simple class="form-control" id="exampleFormControlSelect3" name="estado" required>
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect4">Sexo</label>
							<select simple class="form-control" id="exampleFormControlSelect4" name="sexo" required>
								<option value="1">femenino</option>
								<option value="2">masculino</option>
								<option value="3">Mixto</option>
							</select>
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
							<label for="exampleFormControlSelect2">Actividad</label>
							<select class="form-control" id="exampleFormControlSelect2" name="actividades" required>
								<option value="basquet">Basquet</option>
								<option value="patin">Patín</option>
								<option value="futbol">Futbol</option>
								<option value="arte">Arte</option>		
								<option value="taekwondo">Taekwondo</option>
								<option value="voley">Voley</option>
							</select>
						</div>
						<div class="dropdown-divider mb-2"></div>
						<button type="button" class="btn btn-secondary w-25 float-right" data-dismiss="modal">Cancelar</button>
						<input type="submit" class="btn btn-primary w-50" name="submit" value="Registrar">
					</form>
				</div>
			</div>
		</div>
	</div>
</div> -->
<?php include 'scripts.php'; ?>