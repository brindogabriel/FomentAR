<html>
    <?php
       session_start();

       if (!isset($_SESSION["usuario"])) {
         header("location:formingreso.php");
       }

     ?>

     <?php
        include_once 'enlacesYheader.php' 
      ?>



       <br>
         <br>
         <a href="pagina1.php">pagina1</a>
         <br>
         <br>
         <a href="pagina2.php">pagina2</a>
         <br>
         <br>
    <?php

       echo "hola " . $_SESSION["usuario"];
     ?>

     <br>
     <br>
     <a href="cerrar_sesion.php">cerrar sesion</a>
</html>
