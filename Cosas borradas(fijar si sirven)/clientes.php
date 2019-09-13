<?php include("./nav_externo.php");?>

<meta charset="utf-8">
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
					<th scope="col">Nro_orden</th>
					<th scope="col">Apellido</th>
					<th scope="col">Nombre</th>
					<th scope="col">Domicilio</th>
					<th scope="col">DNI</th>
					<th scope="col">Fecha de Nacimiento</th>
					<th scope="col">Fecha de Ingreso</th>
					<th scope="col">Sexo</th>
					<th scope="col">idParametro_Socio</th>
					<th scope="col">idEstado</th>
					<th scope="col">idCategoria</th>
					<th scope="col">Opciones</th>
				</tr>
			</thead>
			<?php 
			include 'conexion.php';
			$sql ="SELECT * FROM clientes";
			$result=mysqli_query($conexion,$sql);
			while ($mostrar=mysqli_fetch_array($result)) {
				$dato = $mostrar['idParametro_Socio'];
				$dato2 = $mostrar['idEstado'];
				$dato3 = $mostrar['idCategoria'];
				$dato4 = $mostrar['idSexo'];
				$Fecha_nacimiento = date("d/m/Y", strtotime($mostrar['Fecha_nacimiento']));
				$Fecha_ingreso = date("d/m/Y", strtotime($mostrar['Fecha_ingreso']));
				?>
				<tbody>
					<tr>
						<td scope="col"><?php echo $mostrar['Nro_orden'] ?></td>
						<td scope="col"><?php echo utf8_encode($mostrar['Apellido']) ?></td>
						<td scope="col"><?php echo $mostrar['Nombre'] ?></td>
						<td scope="col"><?php echo $mostrar['Domicilio'] ?></td>
						<td scope="col"><?php echo $mostrar['DNI'] ?></td>
						<td scope="col"><?php echo $Fecha_nacimiento?></td>
						<td scope="col"><?php echo $Fecha_ingreso ?></td>
						<td scope="col"><?php  
						switch ($dato4) {
							case '1':
							echo "Femenino";
							break;
							case '2':
							echo "Masculino";
							break;
							case '3':
							echo "Mixto";
							break;
							default:
							echo "0";
							break;
						}
						?>
					</td>
					<td scope="col">

						<?php  if ($dato=="1"):  $dato = "Socio"?>

							<?php else:  $dato = "No socio"?>

							<?php endif ?>
							<?php    echo $dato; ?>

						</td>
						<td scope="col">
							<?php  if ($dato2=="1"):  $dato2 = "Activo"?>

								<?php else:  $dato2 = "Inactivo"?>

								<?php endif ?>
								<?php    echo $dato2; ?>

							</td>
							<td scope="col">
								<?php switch ($dato3) {
									case '1':
									echo "pre-mini-basq";
									break;
									case '2':
									echo "mini-mixto-basq";
									break;
									case '3':
									echo "sub-15-fem-basq";
									break;
									case '4':
									echo "sub-15-masc-basq";
									break;
									case '5':
									echo "sub-17-masc-basq";
									break;
									case '6':
									echo "primera-fem-basq";
									break;
									case '7':
									echo "primera-masc-basq";
									break;
									case '8':
									echo "prim-grupo-vol";
									break;
									case '9':
									echo "seg-grupo-vol";
									break;
									case '10':
									echo "terc-grupo-vol";
									break;
									case '11':
									echo "prim-grupo-patin";
									break;
									case '12':
									echo "seg-grupo-patin";
									break;
									case '13':
									echo "intermedio-patin";
									break;
									case '14':
									echo "avanzado-patin";
									break;
									case '15':
									echo "escuelita-patin";
									break;
									case '16':
									echo "menores-taek";
									break;
									case '17':
									echo "mayores-taek";
									break;
									case '18':
									echo "arte";
									break;
									default:
									echo "0";
									break;
								} ?></td>
								<td scope="col" style="display: flex;justify-content: space-between;margin: 0 auto;">
									<?php  
									echo "<a class='btn btn-warning m-1' href='./modificar5?DNI=".$mostrar['DNI']."' data-toggle='tooltip' role='button' title='Editar'><i class='material-icons'>edit</i></a>";
									?>
									<?php  if ($dato2=="Activo"):  echo "<a class='btn btn-danger m-1' href='./dar_de_baja?DNI=".$mostrar['DNI']."'data-toggle='tooltip' role='button' title='Dar de baja'><i class='material-icons'>
									delete
									</i></a>";	?>

									<?php else:  echo "<a class='btn btn-success m-1' href='./dar_de_alta?DNI=".$mostrar['DNI']."'data-toggle='tooltip' role='button' title='Dar de alta'><i class='material-icons'>
									restore
									</i></a>";
									?>

								<?php endif ?>

							</td>

						</tr>

					</tbody>
					<?php 
				}
				?>
				<tfoot class="thead-dark">
					<tr>
						<th scope="col">Nro_orden</th>
						<th scope="col">Apellido</th>
						<th scope="col">Nombre</th>
						<th scope="col">Domicilio</th>
						<th scope="col">DNI</th>
						<th scope="col">Fecha de Nacimiento</th>
						<th scope="col">Fecha de Ingreso</th>
						<th scope="col">Sexo</th>
						<th scope="col">idParametro_Socio</th>
						<th scope="col">idEstado</th>
						<th scope="col">idCategoria</th>
						<th scope="col">Opciones</th>
					</tr>
				</tfoot>
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
								<label for="exampleFormControlSelect">¿Es Socio?</label>
								<select simple class="form-control" id="exampleFormControlSelect" name="socio" required>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div class="form-group">
								<label for="n_matricula">N° Matricula</label>
								<input type="text" class="form-control" placeholder="N° Matricula" name="n_matricula"  required>
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
									<option value="1">Masculino</option>
									<option value="2">Femenino</option>
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
	</div>
	<?php include("./scripts.php");?>