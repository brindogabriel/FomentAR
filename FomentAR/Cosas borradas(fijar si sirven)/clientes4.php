<?php include("./nav_externo.php");?>
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
			<?php 
			$conexion=mysqli_connect("localhost","root","","fomentar");
			$sql ="SELECT * FROM clientes";
			$result=mysqli_query($conexion,$sql);
			while ($mostrar=mysqli_fetch_array($result)) {
				?>
				<tbody>
					<tr>
						<td scope="col"><?php echo $mostrar['dni'] ?></td>
						<td scope="col"><?php echo $mostrar['n_matricula'] ?></td>
						<td scope="col"><?php echo $mostrar['apellido'] ?></td>
						<td scope="col"><?php echo $mostrar['nombre'] ?></td>
						<td scope="col"><?php echo $mostrar['domicilio'] ?></td>
						<td scope="col"><?php echo $mostrar['nacionalidad'] ?></td>
						<td scope="col" ><?php echo $mostrar['fecha_nacimiento'] ?></td>
						<td scope="col"><?php echo $mostrar['fecha_ingreso'] ?></td>
						<td scope="col"><?php echo $mostrar['categoria'] ?></td>
						<td scope="col"><?php echo $mostrar['socio'] ?></td>
						<td scope="col"><?php echo $mostrar['actividades'] ?></td>
						<td scope="col"><?php echo $mostrar['edad'] ?></td>
						<td scope="col"><?php echo $mostrar['estado'] ?></td>
						<td scope="col" style="display: flex;justify-content: space-between;"><?php echo "
						<a class='btn btn-warning m-1' href='./modificar5?dni=".$mostrar['dni']."' data-toggle='tooltip' role='button' title='Editar'><i class='material-icons'>
						edit
						</i></a>
						<a class='btn btn-danger m-1' href='./dar_de_baja?dni=".$mostrar['dni']."'data-toggle='tooltip' role='button' title='Dar de baja'><i class='material-icons'>
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
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
							<input type="number" class="form-control" placeholder="N° Matricula" name="n_matricula" id="cantidad" required>
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
							<label for="edad">Edad</label>
							<input type="number" class="form-control" placeholder="Edad" name="edad" id="cantidad" required>
						</div>
						<div class="form-group">
							<label for="Estado">Estado</label>
							<input type="number" class="form-control" placeholder="estado" name="estado" id="cantidad" required>
						</div>
						<div class="form-group">
							<label for="nacionalidad">Nacionalidad</label>
							<input type="text" class="form-control" placeholder="Nacionalidad" name="nacionalidad" required>
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
								<option value="si">Si</option>
								<option value="no">No</option>

							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect2">Actividad</label>
							<select multiple class="form-control" id="exampleFormControlSelect2" name="actividades[]" required>
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
</div>

<?php include("./scripts.php");?>