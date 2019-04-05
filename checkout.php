 
<?php $title = 'Checkout'; ?>
<?php $currentPage = 'index'; 
require "php/session.php";
require "php/conn.php";
require "php/login.php";
require "php/laterales.php";
require "php/carrito.php"; 

?>

<?php  
$saltaPagina = "direccion.php";
if (isset($_SESSION["usuario"])) {
	header("location:".$saltaPagina);
	exit;
}
require "php/login.php";

?>
<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>
		</div>
		<div class="col-xs-12 col-md-8 ">
			<div class="well" id="contenedor">
				<ol class="breadcrumb">
					<li  class="active">Iniciar sesión</li>
					<li>Datos de envío</li>
					<li>Formas de pago</li>
					<li>Revisar</li>
				</ol>
				<h2>Checkout</h2>
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<form class="text-left" action="checkout.php" method="post">
					<div class="form-group">
						<label for="email">Correo electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Escribe tu correo electrónico">
					</div>
					<div class="form-group">
						<label for="clave">Clave de acceso:</label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Escribe tu clave de acceso">
					</div>
					<div class="checkbox">
						<label><input type="checkbox">Recordarme</label>
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
		<div class="col-xs-12 hidden-xs col-md-2  sidenav">
			<h4>Productos nuevos</h4>
			<?php nuevos($conn); ?>
			
		</div>
		
	</div>
</div>


<br><br>
<?php include_once 'template/footer.php'; ?>