<?php
    $base  = new PDO("mysql:host=localhost; dbname=sesion", "root", "");

    $usuario=$_POST["usuario"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    //$regist=$_POST["regist"];
    
    
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    class validarRegist{

        public function validEmail($base, $email){
            $existente = $base ->query("SELECT * FROM usuarios WHERE usuario= '$usuario'");
if($existente->rowCount()>0){
 $mensaje = '
    <div class="alert alert-danger alert-desnissable col-md-offset-4 col-md-3 text-center">
    <a href="formregistro.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>El nombre de usuario ya existe.</div>
  ';
  return $mensaje;
 // $mensaje = '<script>alert("EL usuario ya existe");</script>';
// echo"<script type=\"text/javascript\">alert('El usuario ya existe'); window.location='formregistro.php';
    // event.preventDefault();</script>";  
}
        }

    }

?>