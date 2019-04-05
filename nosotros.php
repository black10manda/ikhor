
<?php $title = 'Nosotros'; ?>
<?php $currentPage = 'nosotros'; 
require "php/session.php";?>
<?php 
include_once 'template/header.php'; 
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


		<div class="col-xs-12 col-md-8 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">¿QUÉ ES MI NEGOCIO?</h2>
				<p><img src="img/logo.jpg" width="200" class="media-object izq anim_opacity" alt="Mi foto">Una empresa productora de vino de manera artesanal. </p>
				<h3>Misión </h3>		
				<p>Somos una empresa dedicada a la producción de vino de manera artesanal, cumpliendo las expectativas de nuestros consumidores, comprometidos con el medio ambiente y la sociedad.</p>
				<h3>Visión</h3>
				<p>Ser la empresa de preferencia dentro del mercado regional, gracias a la calidad y el sabor de nuestro producto.</p>
				<h3>Valores</h3>
				<div class="row">
					<div class="col-xs-6">
						<ul style="list-style:none;">
							<li><h5><span style="color: red; font-size: 2em;"> T</span> RANSCENDENCIA.</h5></li>
							<li><h5><span style="color: red; font-size: 2em;">U</span>NIDAD</h5></li>
						</ul>
					</div>
					<div class="col-xs-6">
						<ul style="list-style:none;">
							<li><h5><span style="color: red; font-size: 2em;">V</span> ALENTIA</h5></li>
							<li><h5><span style="color: red; font-size: 2em;">I</span> NTEGRIDAD</h5></li>
							<li><h5><span style="color: red; font-size: 2em;">N</span> OBLEZA</h5></li>
							<li><h5><span style="color: red; font-size: 2em;">O</span> BJETIVIDAD</h5></li>
						</ul>
					</div>
				</div>
				
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