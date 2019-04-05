
<?php $title = 'Bucar'; ?>
<?php $currentPage = 'tienda' ?>
<?php 
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}

require "../php/session.php";
include_once 'template/header.php'; 

require "../php/conn.php";
if (isset($_GET["buscar"])) {
	$buscar = $_GET["buscar"];
	$sql = "SELECT * FROM productos WHERE nombre LIKE '%".$buscar."%' OR descripcion LIKE '%".$buscar."%'";
	$r = mysqli_query($conn, $sql);
	$productos = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($productos, $data);
	}
}

?>
<?php require "../php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Resultados búsqueda: <?php print $buscar; ?></h2>
				<?php
				for ($i=0; $i < count($productos); $i++) { 
					print '<div class="media">';
					print '<div class="media-left">';
					print '<img src="../img/'.$productos[$i]["imagen"].'" class="media-object"/>';
					print '</div>';
					print '<div class="media-body">';
					print '<h4 class="media-heading"><a href="productosCRUD.php?m=C&id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></h4>';
					print '<p>'.$productos[$i]["descripcion"].'</p>';
					print '</div>';
					print '</div>';
				}

				?>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		</div>
	</div>
</div>










<br><br>
<?php include_once 'template/footer.php'; ?>