
<?php $title = 'Vida Rosa'; ?>
<?php $currentPage = 'login'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
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
		<div class="col-sm-8 text-center">
			<div class="well" id="contenedor">
				<h2>En breve llegará tu clave de acceso</h2>
				<p>Revisa tu buzón y cambia la clave de acceso</p>

				<a href="index.php" class="btn btn-success">Regresar</a>
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