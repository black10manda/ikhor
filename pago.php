
<?php $title = 'Pago'; ?>
<?php $currentPage = 'index'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/laterales.php";
if (!isset($_SESSION["usuario"])) {
	header("location:login.php");
}
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
				<ol class="breadcrumb">
					<li><a href="checkout.php">Iniciar sesión</a></li>
					<li><a href="direccion.php">Datos de envío</a></li>
					<li class="active">Forma de pago</li>
					<li>Revisar</li>
				</ol>
				<h2 class="text-center">Formas de pago y envio</h2>
				<p>Favor de seleccinar una de las formas de pago:</p>
				<form action="verifica.php" method="post">
					<div class="radio">
						<label><input type="radio" name="pago" id="tarjeta1" value="tc1">Tarjeta de crédito 1</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="pago" id="tarjeta2" value="tc2">Tarjeta de crédito 2</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="pago" id="tarjeta3" value="tc3">Tarjeta de débito</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="pago" id="efectivo" value="efectivo" checked>Efectivo</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="pago" id="pay Pal" value="payPal">Pay Pal</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="pago" id="bitcoins" value="bitcoins">Bitcoins</label>
					</div>
					<h3>Metodo de envio</h3>
					<div class="form-group text-left" >	
						 <select class="form-control"  name="metodo" >
						  <option value="Estafeta">Estafeta</option>
						  <option value="DHL">DHL</option>
						  <option value="Redpack">Redpack</option>
						  <option value="Correos">Correos de Mexico</option>
						</select> 
					</div>
					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos nuevos</h4>
			<?php nuevos($conn); ?>

		</div>
	</div>
</div>



<br><br>
<?php include_once 'template/footer.php'; ?>