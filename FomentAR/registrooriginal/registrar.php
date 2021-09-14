<?php
 

$base  = new PDO("mysql:host=localhost; dbname=sesion", "root", "");

$usuario=$_POST["usuario"];
$email=$_POST["email"];
$password=$_POST["password"];
//$regist=$_POST["regist"];


$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 if(($_POST['usuario'])) 

    $valid = new validarRegist()

$existente = $base ->query("SELECT * FROM usuarios WHERE usuario= '$usuario'");
if($existente->rowCount()>0){
// $mensaje = '
//<div class="alert alert-danger alert-desnissable col-md-offset-4 col-md-3 text-center">
    //<a href="formregistro.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>El nombre de usuario ya existe.</div>
 // ';
 // printf ($mensaje);
 // $mensaje = '<script>alert("EL usuario ya existe");</script>';
echo"<script type=\"text/javascript\">alert('El usuario ya existe'); window.location='formregistro.php';
     event.preventDefault();</script>";  
}

//$emeilexist = $base ->query("SELECT * FROM usuarios WHERE email= '$email'");
//if($emeilexist->rowCount()>0){
// $mensaje = '
//<div class="alert alert-danger alert-desnissable col-md-offset-4 col-md-3 text-center">
    //<a href="formregistro.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>El nombre de usuario ya existe.</div>
 // ';
 // printf ($mensaje);
 // $mensaje = '<script>alert("EL usuario ya existe");</script>';
// echo"<script type=\"text/javascript\">alert('El Email ya rsta en uso'); window.location='formregistro.php';
  //   event.preventDefault();</script>";  
//}

else{


  $sql = "INSERT INTO usuarios(usuario, email, password) values (:usuario,:email, :password)";

  $resultado = $base->prepare($sql);

  $usuario=htmlentities(addslashes($_POST["usuario"]));
  $email=htmlentities(addslashes($_POST["email"]));
  $password=htmlentities(addslashes($_POST["password"]));

  $resultado -> bindValue(":usuario",$usuario);
  $resultado -> bindValue(":email",$email);
  $resultado -> bindValue(":password",$password);

  if($resultado->execute()){
       header("location:formingreso.php");
    }
  }

 
?>
