
<?php $title = 'Cambiar Contraseña'; ?>
<?php $currentPage = 'Cambiar Contraseña'; 
require "php/session.php";?>
<?php include_once 'template/header.php';
require "php/conn.php";
require "php/laterales.php";?>
<?php require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>
		</div>
		<div class="col-sm-8 text-center">
			<div class="well" id="contenedor">
				<h2>Cambio de clave de acceso exitosa</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut massa eget odio porttitor rutrum. Aliquam vulputate lacus sem, non congue mauris venenatis id. Praesent elementum in purus ut dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec sodales ligula. Duis lobortis hendrerit enim, condimentum accumsan purus pellentesque ac. Phasellus neque nisl, scelerisque vel leo ac, condimentum sodales mauris.</p>
				<a href="index.php" class="btn btn-success" role="button">Regresar</a>
				
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		<h4>Productos nuevos</h4>
		<?php nuevos($conn); ?>
		</div>
	</div>
</div>


<br><br>
<?php include_once 'template/footer.php'; ?>