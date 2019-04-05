
<?php $title = 'Verificar'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/session.php";
require "php/laterales.php";
?>
<?php 
require "php/carrito.php"; 
if(!isset($_SESSION["usuario"])){
	header("location:login.php");
	exit;
}
if(isset($_POST["pago"])){
	$pago = $_POST["pago"];
	$metodo= $_POST["metodo"];
}

?>
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
					<li><a href="checkout.php">Iniciar sesión</a></li>
					<li><a href="direccion.php">Datos de envío</a></li>
					<li><a href="pago.php">Forma de pago</a></li>
					<li class="active">Revisar</li>
				</ol>
				<h2>Valide sus datos</h2>
				<p>Modo de págo: <?php print $pago; ?></p>
				<p>Modo de Envio: <?php print $metodo; ?></p>
				<p>Nombre: <?php print $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellido"]; ?></p>
				<p>Dirección:<?php print $_SESSION["usuario"]["direccion"].", Col. ".$_SESSION["usuario"]["colonia"].", estado ".$_SESSION["usuario"]["estado"].", ciudad ".$_SESSION["usuario"]["ciudad"].", ".$_SESSION["usuario"]["pais"]; ?></p>
				<p>Código postal: <?php print $_SESSION["usuario"]["codpos"]; ?></p>
				<br><br>
				<?php despliegaCarritoCompleto($carrito, true, $conn); ?>
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