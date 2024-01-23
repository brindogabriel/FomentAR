<?php

$db_host = "localhost";

$db_user = "id20438866_root";
$db_password = "a^_Y!n6C[vPkk8[5";
$db_name = "id20438866_fomentar";

$db_user_local = "root";
$db_password_local = "";
$db_name_local = "fomentar";

$conexion = mysqli_connect($db_host, $db_user_local, $db_password_local, $db_name_local);
mysqli_query($conexion, "SET CHARACTER SET utf8");
mysqli_query($conexion, "SET NAMES utf8");