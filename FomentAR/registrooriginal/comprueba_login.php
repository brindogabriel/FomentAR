<?php
  try {
    $base  = new PDO("mysql:host=localhost; dbname=sesion", "root", "");

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM usuarios WHERE usuario = :usuario AND password= :password";

    $resultado = $base->prepare($sql);

    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes($_POST["password"]));

    $resultado ->bindValue(":usuario",$usuario);
    $resultado ->bindValue(":password",$password);

    $resultado->execute();

    $cantResultados=$resultado->rowCount();

    if ($cantResultados!=0) {
      session_start();

       $_SESSION["usuario"]=$_POST["usuario"];

      header("location:sesion.php");

    }else{
     
      header("location:formingreso.php");
      
    }


  } catch (Exception $e) {
    die("Error: " . $e->getMessage());
  }

 ?>
