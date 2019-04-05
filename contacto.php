
<?php $title = 'Contacto'; ?>
<?php $currentPage = 'contacto'; 
require "php/session.php";?>
<?php 
include_once 'template/header.php'; 
require "php/conn.php";
require "php/laterales.php";
?>
<?php require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>
			
		</div>
		<div class="col-sm-5 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Contacto</h2>
				<p>Favor de capturar sus datos</p>
				<form action="contactoGracias.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre"/>
					</div>

					<div class="form-group text-left">
						<label for="email">* Correo electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Escriba su correo electrónico"/>
					</div>

					<div class="form-group text-left">
						<label for="asunto">* Asunto:</label>
						<input type="text" name="asunto" id="asunto" class="form-control" required placeholder="Escriba su asunto"/>
					</div>

					<div class="form-group text-left">
						<label for="mensaje">* Observaciones:</label>
						<textarea class="form-control" name="mensaje" id="mensaje"></textarea>
					</div>

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>

				</form>
			</div>
		</div>
		<div class="col-sm-5 ">
		
		<div class="well " id="contenedor">
			<h4>Visitanos</h4>
			<iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d937.0990873057763!2d-100.71714837082685!3d20.03383465911446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd673e0927885%3A0x47ee87c583ab7fbd!2sM.+Doblado+523%2C+Zona+Centro%2C+38600+Ac%C3%A1mbaro%2C+Gto.!5e0!3m2!1ses-419!2smx!4v1553832329839!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		</div>
	</div>
</div>


<br><br>
<?php include_once 'template/footer.php'; ?>