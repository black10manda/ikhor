
<?php $title = 'Registrar'; ?>
<?php $currentPage = 'login'; ?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/session.php";
require "php/laterales.php";
?>
<?php 
require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
		<?php masVendidos($conn); ?>

		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Gracias por registrarse</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<a href="index.php" class="btn btn-success" role="button">Regresar</a>
				
			</div>
		</div>
		<div class="col-xs-12  col-md-2 sidenav">
			<h4>Productos nuevos</h4>
			<?php nuevos($conn); ?>
		</div>
	</div>
</div>


<br><br>
<?php include_once 'template/footer.php'; ?>