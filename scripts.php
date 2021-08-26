<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
</script>



<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("actives");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
</script>

<script>
$(document).ready(function() {
    $('input#cantidad')
        .keypress(function(event) {
            if (event.which < 48 || event.which > 57 || this.value.length === 9) {
                return false;
            }
        });
});
</script>

<script>
$('.datepicker').datepicker();
$(function() {
    $('[data-toggle="popover"]').popover();
});
</script>

<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>



<script src="../CosasParaQueFuncioneSinInternet/jquery-3.3.1.js"></script>
<script src="./popper.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="../CosasParaQueFuncioneSinInternet/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css"
    href="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/css/buttons.bootstrap4.css" />
<link rel="stylesheet" type="text/css"
    href="../CosasParaQueFuncioneSinInternet/DataTables/FixedColumns-3.2.5/css/fixedColumns.bootstrap4.css" />
<link rel="stylesheet" type="text/css"
    href="../CosasParaQueFuncioneSinInternet/DataTables/FixedHeader-3.1.4/css/fixedHeader.bootstrap4.css" />

<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="../CosasParaQueFuncioneSinInternet/DataTables/DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript"
    src="../CosasParaQueFuncioneSinInternet/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript"
    src="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/js/dataTables.buttons.js"></script>
<script type="text/javascript"
    src="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/js/buttons.colVis.js">
</script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/js/buttons.flash.js">
</script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/js/buttons.html5.js">
</script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/DataTables/Buttons-1.5.4/js/buttons.print.js">
</script>
<script type="text/javascript"
    src="../CosasParaQueFuncioneSinInternet/DataTables/FixedColumns-3.2.5/js/dataTables.fixedColumns.js"></script>
<script type="text/javascript" src="../CosasParaQueFuncioneSinInternet/FixedHeader-3.1.4/js/dataTables.fixedHeader.js">
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
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