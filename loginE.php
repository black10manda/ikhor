
<?php $title = 'Vida Rosa'; 
$saltaPagina = "index.php";?>
<?php $currentPage = 'login';
require "php/conn.php";
require "php/session.php"; 
require "php/login.php";?>
<?php include_once 'template/header.php'; ?>
<?php 
require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>



<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<h4>Productos más vendidos</h4>
			
		</div>
		<div class="col-sm-8 text-center">
			<div class="well" id="contenedor">
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2>Iniciar sesión</h2>
				<form class="text-left" action="loginE.php" method="post">
					<div class="form-group">
						<label for="email">Correo electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Escribe tu correo electrónico" >
					</div>
					<div class="form-group">
						<label for="clave">Clave de acceso:</label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Escribe tu clave de acceso" >
					</div>
					<div class="checkbox">
						<label><input type="checkbox" id="recordarme" name="recordarme" >Recordarme</label>
					</div>

					<div class="form-group text-left">
						<label for="entrar"></label>
						<input type="submit" name="entrar" value="Entrar" class="btn btn-success" role="button"/>
					</div>

				</form>
			</div>
			<div class="well text-left" id="contenedor" >
				<a href="olvido.php" class="btn btn-info">¿Olvidó su clave de acceso?</a>
				<br><br>
				<a href="registro.php" class="btn btn-info">Registrarte en el sitio</a>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		<h4>Productos nuevos</h4>
					</div>
	</div>
</div>









<br><br>
<?php include_once 'template/footer.php'; ?>