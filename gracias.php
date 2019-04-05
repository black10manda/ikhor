
<?php $title = 'Greacias'; ?>
<?php $currentPage = 'index'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/laterales.php";
if (isset($_SESSION["carrito"])) {
	$carrito = $_SESSION["carrito"];
} else {
	header("location:login.php");
	exit;
}
$sql = "UPDATE carrito ";
$sql .= "SET estado='1', idUsuario=".$_SESSION["usuario"]["id"];
$sql .= " WHERE num='".$carrito."'";
//Ejecutamos el query
if(mysqli_query($conn, $sql)){
	//Borramos las variables
	unset($carrito);
	unset($_SESSION["carrito"]);
} else {
	//Mensaje de error
	$error = "Error al actualizar el carrito";
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
				<?php 
				if(isset($error)){
					print '<div class="alert alert-danger">';
					print '<strong>'.$error.'</strong>';
					print '</div>';
				} else {
					print '<h2>Gracias por su compra</h2>';
					print '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut massa eget odio porttitor rutrum. Aliquam vulputate lacus sem, non congue mauris venenatis id. Praesent elementum in purus ut dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec sodales ligula. Duis lobortis hendrerit enim, condimentum accumsan purus pellentesque ac. Phasellus neque nisl, scelerisque vel leo ac, condimentum sodales mauris.</p>';
					print '<a href="index.php" class="btn btn-success" role="button">Regresar</a>';
				}
			?>
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