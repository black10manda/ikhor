


<?php $title = 'producto'; 
require "php/session.php";
?>

<?php 
require "php/carrito.php"; ?>

<?php $currentPage = 'tienda'; 
require "php/conn.php";
require "php/laterales.php";
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$sql = "SELECT * FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
}
function muestraProductoRelacionado($id, $conn)
{
	$sql = "SELECT nombre, imagen FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
	//Desplegamos etiquetas
	print '<div class="well">'.$data["nombre"];
	print '<a href="producto.php?id='.$id.'"><img src="img/'.$data["imagen"].'" class="media-object img-resposvive" width="100%"></a>';
	print '</div>';
}

?>
<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>
<style type="text/css">
	.comment_box{
    background-color: #333;
    box-shadow: 7px 7px 10px; 
    border: 2px dashed white;
    color: white;
    padding: 10px;
}


</style>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-6 col-md-2 sidenav">
			<img src="img/<?php print $data['imagen']; ?>" class="media-object img-responsive anim_hover_1" style="width: 100%;">
			<br>
			<h4>Num. Producto <?php print $data['id']; ?> </h4>
			<h4>Precio $<?php print $data['precio']; ?></h4>
			<br><br>
			<div class="well">
				<p>Carrito De Compras</p>
				<p>Total: $<?php echo despliegaCarrito($carrito, $conn); ?></p>
			</div>
			<a href="carrito.php?id=<?php print $id ?>" class="btn btn-success" role="button"> Carrito</a>
			<a href="index.php" class="btn btn-info" role="button"> Regresar</a>
		</div>
		<div class="col-xs-6 col-md-8 text-left">
			<h2><?php print $data['nombre']; ?></h2>
			<p><?php print $data['descripcion']; ?></p>

			<div class="col-xs-12">
				<?php require "comentarios.php"; ?>
			</div>

		</div>
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
				<!--?php
			if($data["tipo"]=="0"){
				print '<h4>Productos relacionados</h4>';
				print '<div class="well">';
				if ($data["relacion1"]!=0) {
					muestraProductoRelacionado($data["relacion1"], $conn);
				}
				if ($data["relacion2"]!=0) {
					muestraProductoRelacionado($data["relacion2"], $conn);
				}
				if ($data["relacion3"]!=0) {
					muestraProductoRelacionado($data["relacion3"], $conn);
				}
			} else if($data["tipo"]=="1"){
				print '<h4>Productos nuevos</h4>';
				print '<div class="well">';
				nuevos($conn);
			}
			?-->
			
			<h4>Productos nuevos</h4>
      <?php nuevos($conn); ?>
		
		
		</div>
			
			
		</div>
		
		
	</div>
</div>

<br><br>

<footer class="container-fluid text-center">
	<a href="terminoLegales.php">Terminos Legales.</a>
</footer>
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>