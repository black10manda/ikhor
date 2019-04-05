
<?php $title = 'Tienda'; ?>
<?php $currentPage = 'tienda'; ?>
<?php 
include_once 'template/header.php'; 
require "php/conn.php";
require "php/session.php";
$sql = "SELECT * FROM productos ORDER BY masvendido DESC, nombre";
$r = mysqli_query($conn, $sql);
$productos = array();
while($row = mysqli_fetch_array($r)){
	array_push($productos, $row);
}
?>
<?php 
require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>



<div class="jumbotron">
	<div class="container text-center">
		<h1>Todos los Productos.</h1>
		<p>Mary Kay</p>
	</div>
	
</div>
<div class="container-fluid bg-3 text-center">
	<div class="row">
		<?php
	$ren = 0;
	for ($i=0; $i < count($productos) ; $i++) { 
		if ($ren==0) {
			print '<div class="row">';
		}
		print '<div class="col-sm-3 well" style="height: 690px;">';
		print '<p>'.$productos[$i]["nombre"].'</a></p>';
		print '<img src="img/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded anim_hover_1" style="width:100%; height: 80%;" alt="'.$productos[$i]["nombre"].'">';
		print "<br>";
		print '<p><a class="btn btn-primary" href="producto.php?id='.$productos[$i]["id"].'">'."$ ".$productos[$i]["precio"].'</a></p>';
		print '</div>';
		$ren++;
		if ($ren==4) {
			$ren = 0;
			print "</div>";
		}
	}
	?>
	
		
	</div>

	
</div> <br>


<br><br>

<?php include_once 'template/footer.php'; ?>