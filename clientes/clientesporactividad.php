<?php
session_start();
//error_reporting(0); -descomentar cuando se termina
$varsesion = $_SESSION['usuario'];
$rol = $_SESSION['id_rol'];

if ($varsesion == null || $varsesion = '') {
    header("location: ../errors/error_nologueado");
    die();
}

include "../database/conexion.php";
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="icon" type="image/png" href="../Images/logo-negro.png">
    <link rel="icon" type="image/png" href="../Images/logo-blanco.png" media="(prefers-color-scheme:dark)">
    <title>FomentAR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand mb-0 h1" href="../pagina_principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M4 10v7h3v-7H4zm6 0v7h3v-7h-3zM2 22h19v-3H2v3zm14-12v7h3v-7h-3zm-4.5-9L2 6v2h19V6l-9.5-5z"
                    fill="white" />
            </svg>
            FomentAR
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../pagina_principal">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='../clientes'>Todos los Clientes</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='../eventos'>Eventos</a>
                </li>
                <?php
                if ($rol == 1) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='../recaudacion'>Recaudacion</a>
                </li>
                ";
                }
                ?>
                <li class="nav-item">
                    <a class='nav-link' href='../reporte_errores'>Reporte Errores</a>
                </li>

                <?php
                if ($rol == 1) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='../gestion_usuarios/'>Gestion de usuarios</a>
                </li>";
                }
                ?>

            </ul>
            <a class="btn btn-primary disabled text-white mr-2" role="button" disabled
                style="text-transform: capitalize;">
                <?php
                $varsesion = $_SESSION['usuario'];
                echo $varsesion;
                ?>
            </a>
            <a class="btn btn-outline-danger" href="./database/cerrar_sesion" role="button">Cerrar sesión</a>
        </div>
    </nav>
    <!-- FILTRAR POR ACTIVIDAD -->
    <div class="container mt-4">
        <div class="d-flex justify-content-around">
            <a href="./clientesporactividad.php?id_actividad=1" class="btn btn-outline-primary">Basquet</a>
            <a href="./clientesporactividad.php?id_actividad=2" class="btn btn-outline-primary">Futbol</a>
            <a href="./clientesporactividad.php?id_actividad=3" class="btn btn-outline-primary">Voley</a>
            <a href="./clientesporactividad.php?id_actividad=6" class="btn btn-outline-primary">Arte</a>
            <a href="./clientesporactividad.php?id_actividad=5" class="btn btn-outline-primary">Taekwondo</a>
            <a href="./clientesporactividad.php?id_actividad=4" class="btn btn-outline-primary">Patin</a>
        </div>
    </div>
    <!-- BUSCAR CLIENTE ANASHE -->
    <div class="container mt-4">
        <form class="form-inline" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?nombre=$cliente"
            method="GET">
            <div class="input-group w-100">
                <input type="search" name="nombre" class="form-control" placeholder="Buscar cliente">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <div class="row">
            <?php
            if (isset($_GET['id_actividad'])) {
                $id_actividad = $_GET['id_actividad'];
                $sql = "SELECT c.id_cliente, c.nombre, act.id_actividad, act.nombre_actividad, act.color_act FROM clientes_actividad cli_act JOIN clientes c ON c.id_cliente = cli_act.id_cliente AND cli_act.id_actividad = $id_actividad JOIN actividades act ON act.id_actividad = cli_act.id_actividad;";
                $sql_run = mysqli_query($conexion, $sql);

                echo "<div class='card-columns'>";

                while ($mostrar = mysqli_fetch_array($sql_run)) {
                    echo "<div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . htmlspecialchars($mostrar['nombre']) . "</h5>
                                <a href='./clientesporactividad.php?id_actividad=" . htmlspecialchars($mostrar['id_actividad']) . "' class='badge badge-" . htmlspecialchars($mostrar['color_act']) . "'>" . htmlspecialchars($mostrar['nombre_actividad']) . "</a>
                                <br/>
                                <a href='./clientes_info.php?id_cliente=" . htmlspecialchars($mostrar['id_cliente']) . "' class='btn btn-secondary mt-2'>Ver + info</a>
                            </div>
                        </div>";
                }
                echo "</div>";
            }
            if (isset($_GET['nombre'])) {
                $nombre = $_GET['nombre'];
                $sql = "SELECT cli.id_cliente, cli.nombre, cli.apellido, act.nombre_actividad FROM clientes_actividad cli_act, clientes cli, actividades act WHERE cli_act.id_cliente = cli.id_cliente AND cli_act.id_actividad = act.id_actividad AND cli.nombre LIKE '%$nombre%'";
                $sql_run = mysqli_query($conexion, $sql);

                while ($mostrar = mysqli_fetch_array($sql_run)) {
                    echo "<div class='col-md-4 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . htmlspecialchars($mostrar['nombre']) . " " . htmlspecialchars($mostrar['apellido']) . "</h5>
                                    <a href='./clientes_info.php?id_cliente=" . htmlspecialchars($mostrar['id_cliente']) . "' class='btn btn-secondary mt-2'>Ver + info</a>
                                </div>
                            </div>
                        </div>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include "../scripts.php" ?>

    <script>
    const tabsBox = document.querySelector(".tabs-box"),
        allTabs = tabsBox.querySelectorAll(".tab"),
        arrowIcons = document.querySelectorAll(".icon i");

    let isDragging = false;

    const handleIcons = (scrollVal) => {
        let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
        arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
        arrowIcons[1].parentElement.style.display = maxScrollableWidth - scrollVal <= 1 ? "none" :
            "flex";
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
</body>

</html>