<link rel="stylesheet" type="text/css" href="./DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="./DataTables/Buttons-1.5.4/css/buttons.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="./DataTables/FixedColumns-3.2.5/css/fixedColumns.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="./DataTables/FixedHeader-3.1.4/css/fixedHeader.bootstrap4.css" />

<script type="text/javascript" src="./DataTables/JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="./DataTables/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="./DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="./DataTables/DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="./DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.5.4/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.5.4/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="./DataTables/Buttons-1.5.4/js/buttons.colVis.js">
</script>
<script type="text/javascript" src="./DataTables/Buttons-1.5.4/js/buttons.flash.js">
</script>
<script type="text/javascript" src="./DataTables/Buttons-1.5.4/js/buttons.html5.js">
</script>
<script type="text/javascript" src="./DataTables/Buttons-1.5.4/js/buttons.print.js">
</script>
<script type="text/javascript" src="./DataTables/FixedColumns-3.2.5/js/dataTables.fixedColumns.js"></script>
<script type="text/javascript" src="./DataTables/FixedHeader-3.1.4/js/dataTables.fixedHeader.js">
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay datos :(",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron coincidencias",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Próximo",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar orden de columna ascendente",
                "sortDescending": ": Activar orden de columna desendente"
            }
        }
    });
});
</script>