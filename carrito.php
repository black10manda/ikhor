
<?php $title = 'Carrito'; ?>
<?php $currentPage = 'index'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/laterales.php";
require "php/carrito.php";

//la m nos indica que se va a borrar
if (isset($_GET["m"])) {
	//Recuperamos el identificador
	$id = $_GET["id"];
	//Delete
	$sql = "DELETE FROM carrito WHERE idProducto=".$id." AND num='".$carrito."'";
	if(!mysqli_query($conn, $sql)) print "Error al borrar el registro";
} else if (isset($_GET["id"])) {
	//El usuario nos envía un producto
	//Recuperamos los datos de los productos
	$id = $_GET["id"];
	$sql = "SELECT * FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
	//Si existe ya el carrito, lo recuperamos
	if(isset($_SESSION['carrito'])){
		$carrito = $_SESSION['carrito'];
	} else {
		//Si no existe el carrito, lo creamos
		//y lo almacenamos en una variable de sesión
		$carrito = llaveCarrito(30);
		$_SESSION['carrito']=$carrito;
	}
	print $carrito;
	//Agregamos el producto en el carrito
	agregaProducto($carrito,$id, $data["precio"], $data["descuento"], $data["envio"],$conn);
}
if(isset($_POST["num"])){
	$num = $_POST["num"];
	for ($i=0; $i < $num; $i++) { 
		$producto = $_POST["i".$i];
		$cantidad = $_POST["c".$i];
		actualizaProducto($carrito, $producto, $cantidad, $conn);
	}
}
?>

<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>

		</div>
		<div class="col-xs-12 col-md-8 text-left">
			<div class="well" id="contenedor">
				<ol class="breadcrumb">
					<li><a href="index.html">Inicio</a></li>
					<li class="active">Carrito</li>
				</ol>
				<?php despliegaCarritoCompleto($carrito, false, $conn); ?>
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