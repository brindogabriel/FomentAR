<?php include("./nav_externo.php");?>
<?php 
include 'conexion.php';
$basquet = "SELECT * FROM clientes";
$resBasquet=mysqli_query($conexion,$basquet);
?>
<link rel="stylesheet" href="../CosasParaQueFuncioneSinInternet/material-icons.css">

<meta charset="utf-8">
<div class="contenedor">
  <div class="table-responsive" class="w-100">
    <table id="example" class="table table-responsive display" width="100%" cellspacing="0">
      <thead>
       <tr>
        <th>Nro_orden</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>idCategoria</th>
        <th>pago</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Nro_orden</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>idCategoria</th>
        <th>pago</th>
      </tr>
    </tfoot>
    <tbody>
      <?php 

      while ($mostrar=mysqli_fetch_array($resBasquet)) {
        echo '<tr>
        <td>'.$mostrar['Nro_orden'].'</td>
        <td>'.$mostrar['Apellido'].'</td>
        <td>'.$mostrar['Nombre'].'</td>
        <td>'.$mostrar['DNI'].'</td>
        <td>'.$mostrar['idCategoria'].'</td>

        </tr>';
        

      }
      ?>
      <!--  <td>'.$mostrar['pago'].'</td> esto va debajo de "idcategoria"  -->
    </tbody>
  </table>
</div>
</div>

</div>
</div>
</div>
<script src="../CosasParaQueFuncioneSinInternet/jquery-3.3.1.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js'></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>


<script >
  $(document).ready(function() {
    $('#example').DataTable( {
      language: {
        "decimal":        "",
        "emptyTable":     "No hay datos",
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
        "infoFiltered":   "(Filtro de _MAX_ total registros)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Buscar:",
        "zeroRecords":    "No se encontraron coincidencias",
        "paginate": {
          "first":      "Primero",
          "last":       "Ultimo",
          "next":       "Próximo",
          "previous":   "Anterior"
        },
        "aria": {
          "sortAscending":  ": Activar orden de columna ascendente",
          "sortDescending": ": Activar orden de columna desendente"
        }
      }
    } );
  } );
</script>