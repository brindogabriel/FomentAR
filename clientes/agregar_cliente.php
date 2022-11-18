<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Resources/material-icons.css">



    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <title>Document</title>
</head>

<body>

    <div class="botones">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Agregar nuevo
        </button>
    </div>

    <!-- Modal -->
    <div class="modal hide fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <form action="add_clientes.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" class="form-control" placeholder="Domicilio" name="domicilio"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">num Domicilio</label>
                                <input type="number" class="form-control" placeholder="num_domicilio"
                                    name="num_domicilio" id="cantidad" required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">telefono</label>
                                <input type="number" class="form-control" placeholder="telefono" name="telefono"
                                    id="cantidad" required>
                            </div>
                            <div class="form-group">
                                <label for="DNI">DNI</label>
                                <input type="number" class="form-control" placeholder="DNI" name="DNI" id="cantidad"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="DNI">EDAD</label>
                                <input type="number" class="form-control" placeholder="EDAD" name="edad" id="cantidad"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" max="3000-12-31" min="1000-01-01"
                                    class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de ingreso</label>
                                <input type="date" name="fecha_ingreso" max="3000-12-31" min="1000-01-01"
                                    class="form-control" placeholder="Fecha de ingreso" name="fecha_ingreso" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">¿Es socio?</label>
                                <input type="number" class="form-control" placeholder="numero o vacio" name="num_socio"
                                    id="cantidad">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Sexo</label>
                                <select simple class="form-control" id="exampleFormrControlSelect" name="Sexo" required>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control js-example-basic-multiple" name="actividades[]"
                                    multiple="multiple" style="width:100%;" id="mySelect2">
                                    <option value="1">Basquet</option>
                                    <option value="2">Futbol</option>
                                    <option value="3">Voley</option>
                                    <option value="4">Patin</option>
                                    <option value="5">Taekwondo</option>
                                    <option value="6">Arte</option>
                                </select>
                            </div>
                            //? hola soy un comentario anashe
                            <div class="dropdown-divider"></div>
                            <button type="button" class="btn btn-secondary float-right"
                                data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-primary" name="submit" value="Registrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <?php include "../scripts.php";?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};
    $(document).ready(function() {
        $('#mySelect2').select2({
            dropdownParent: $('#exampleModalCenter .modal-content'),
            placeholder: 'Seleccione una o varias actividades',
        });
    });
    </script>






</body>

</html>