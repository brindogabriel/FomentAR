<?php
  include_once 'headerForm.php';
 ?>


<style>
  .formulario{
    border-radius:5px;
    margin:auto;
    margin-top:20px;
	width: 50%;
	padding: 30px;
  border:1px solid rgba(0,0,0,0.2);
  background:url(https://www.muycomputer.com/wp-content/uploads/2018/05/vinilo-1000x600.jpg);
  }

  .containerr{
    background:url(https://www.muycomputer.com/wp-content/uploads/2018/05/vinilo-1000x600.jpg);
    width:90%;
    height:100%;
    display:flex;

  }

  p{
    color:141414;
  }

  h3{
    color:#000;
  }
  input{
	background:rgba(0,0,0,0.7);
  color:#fff;
  border-radius:10px;
	display:block;
	padding: 10px;
	width: 100%;
	margin: 30px 0;
	font-size: 20px;
	border:1px solid brown;
	} 

input[type="submit"] {
	background:linear-gradient(#f51212, #711111);
	border: 0;
	color: #ccc;
	opacity: 0.8;
	cursor: pointer;
	border-radius: 20px;
	margin-bottom: 0px;
}

input[type="submit"]:hover{
	opacity: 1
}

input[type="submit"]:active{
	transform: scale(0.9);
}


</style>



<body>

   <center>

         <p>
            No tienes una cuenta? <a href="formregistro.php"> Registrate!</a>
        </p>
      <form class="formulario" action="comprueba_login.php" method="post">
         <h3 class="titulo" >Login</h3>
        <input type="text" name="usuario" placeholder="Nombre" required>
        <input type="password" name="password" placeholder="Password" required>
        <input class="boton" type="submit" value="ingresar">
      </form>
  </center>
    <br>
    <br>
  </body>

    <?php
     include_once 'plantilla_cierre.php';
     ?>









  <?php
   include_once 'plantilla_cierre.php';
   ?>
