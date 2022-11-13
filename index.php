<?php
session_start();
if (isset($_SESSION['usuarios'])){
    header("location: ./pagina_principal");
    die();
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./Images/logo.png" />
    <link rel="stylesheet" href="./Resources/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/general.css">
    <title>FomentAR | Login</title>
</head>

<body>
    <div class="contenedor-login">
        <div class="form-login">
            <img src="./Images/login.ico" alt="" class="rounded-circle">
            <form action="./database/validarlogin" method="POST" class="w-100 p-0">
                <h1>Bienvenido a FomentAR</h1>
                <div class="form-group w-100">
                    <input type="text" class="form-control w-100" placeholder="Usuario" name="username" required
                        id="nombre">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span for="checkk" id="check">Mostrar&nbsp;</span>
                            <input type="checkbox" onclick="myFunction()" title="Mostrar Contraseña"
                                data-toggle="tooltip" data-placement="top" class="w-20" id="checkk">
                        </div>
                    </div>
                    <input type="password" class="form-control w-80" id="myInput" placeholder="Contraseña"
                        name="password">
                </div>
                <input type="submit" name="submit" class="btn btn-primary w-100" value="Ingresar">
            </form>
        </div>
    </div>
    <script>
    function myFunction() {
        var x = document.getElementById("myInput");
        let y = document.getElementById("check");
        if (x.type === "password") {
            x.type = "text";
            y.innerHTML = "Ocultar&nbsp;";
        } else {
            x.type = "password";
            y.innerHTML = "Mostrar&nbsp;";
        }
    }
    </script>
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./Resources/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>