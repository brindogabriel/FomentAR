<!-- //* ACTIVAR TOOLTIPS EN TODOS LADOS -->
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<!-- //? ACTIVAR ACORDEON ???? -->
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
<!-- //* NO PERMITIR LETRA E NI OTRAS COSAS EN INPUT NUMBER -->
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
<!-- //? HACER ANDAR EL INPUT DEL CALENDARIO -->
<script>
$(function() {
    $('[data-toggle="popover"]').popover();
});
</script>
<!-- //* LOGIN (VER PASSWORD) -->
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
<!-- //* ACTIVAR TOOLTIPS EN TODOS LADOS -->
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>


<!-- //* DATATABLES ( VER CUAL FUNCIONA ) -->
<link rel="stylesheet" type="text/css"
    href="../Resources/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="../Resources/DataTables/Buttons-1.5.4/css/buttons.bootstrap4.css" />
<link rel="stylesheet" type="text/css"
    href="../Resources/DataTables/FixedColumns-3.2.5/css/fixedColumns.bootstrap4.css" />
<link rel="stylesheet" type="text/css"
    href="../Resources/DataTables/FixedHeader-3.1.4/css/fixedHeader.bootstrap4.css" />
<script type="text/javascript" src="../Resources/DataTables/JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="../Resources/DataTables/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="../Resources/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="../Resources/DataTables/DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../Resources/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="../Resources/DataTables/Buttons-1.5.4/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="../Resources/DataTables/Buttons-1.5.4/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="../Resources/DataTables/Buttons-1.5.4/js/buttons.colVis.js">
</script>
<script type="text/javascript" src="../Resources/DataTables/Buttons-1.5.4/js/buttons.flash.js">
</script>
<script type="text/javascript" src="../Resources/DataTables/Buttons-1.5.4/js/buttons.html5.js">
</script>
<script type="text/javascript" src="../Resources/DataTables/Buttons-1.5.4/js/buttons.print.js">
</script>
<script type="text/javascript" src="../Resources/DataTables/FixedColumns-3.2.5/js/dataTables.fixedColumns.js"></script>
<script type="text/javascript" src="../Resources/DataTables/FixedHeader-3.1.4/js/dataTables.fixedHeader.js">
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "order": [],
        language: {
            "decimal": "",
            "emptyTable": "No hay datos :'c",
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
            },
        }
    });
});
</script>
<!-- //* PILLS LIKE YOUTUBE  -->
<script>
const tabsBox = document.querySelector(".tabs-box"),
    allTabs = tabsBox.querySelectorAll(".tab"),
    arrowIcons = document.querySelectorAll(".icon i");

let isDragging = false;

const handleIcons = (scrollVal) => {
    let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
    arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
    arrowIcons[1].parentElement.style.display = maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        // if clicked icon is left, reduce 350 from tabsBox scrollLeft else add
        let scrollWidth = tabsBox.scrollLeft += icon.id === "left" ? -340 : 340;
        handleIcons(scrollWidth);
    });
});

allTabs.forEach(tab => {
    tab.addEventListener("click", () => {
        tabsBox.querySelector(".active").classList.remove("active");
        tab.classList.add("active");
    });
});

const dragging = (e) => {
    if (!isDragging) return;
    tabsBox.classList.add("dragging");
    tabsBox.scrollLeft -= e.movementX;
    handleIcons(tabsBox.scrollLeft)
}

const dragStop = () => {
    isDragging = false;
    tabsBox.classList.remove("dragging");
}

tabsBox.addEventListener("mousedown", () => isDragging = true);
tabsBox.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
</script>