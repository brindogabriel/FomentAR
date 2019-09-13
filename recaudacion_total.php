<?php include("./nav_externo.php");?>
<?php
$varsesion = $_SESSION['usuario'];
if ($varsesion == "usuario" ) {
	header("location: ./error_privilegio");
	die();
}
?>
<?php $dinero = 123456789 ?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">$<?php echo $dinero?> recaudados en total</h1>
		<p class="lead"></p>
	</div>
</div>
<?php include("./scripts.php");?>