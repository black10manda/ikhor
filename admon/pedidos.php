<?php 
ini_set('error_reporting',0);
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}

 ?>
<?php $title = 'CPanel'; ?>
<?php $currentPage = 'Pedidos'; ?>
<?php require "../php/conn.php";
	  require "../php/funciones.php";
	  require "../php/carrito.php";?>
<?php 

//Modo de la página
//S - consulta
//A - alta
//B - borrar
//C - cambiar
if (isset($_GET["m"])) {
	$m = $_GET["m"];
} else {
	$m = "S";
}
//lee la tabla productos
if ($m=="D") {
	$id = $_GET["id"];
	//Verificar que el usuario no tenga ningún registro en la tabla "carrito"
	$sql = "SELECT * FROM carrito WHERE num='".$id."'";
	$r = mysqli_query($conn, $sql);
	//Trasladamos los registros a la tabla histórica
	while($data = mysqli_fetch_assoc($r)){
		$sql = "INSERT INTO historicopedidos ";
		$sql .= "SET num='".$data["num"]."', ";
		$sql .= "estado='".$data["estado"]."', ";
		$sql .= "idProducto=".$data["idProducto"].", ";
		$sql .= "precio=".$data["precio"].", ";
		$sql .= "descuento=".$data["descuento"].", ";
		$sql .= "envio=".$data["envio"].", ";
		$sql .= "cantidad=".$data["cantidad"];
		if (!mysqli_query($conn, $sql)) {
			print "Error al insertar el producto";
		}
	}
	//Borramos el registro
	$sql = "DELETE FROM carrito WHERE num='".$id."'";
	if(mysqli_query($conn, $sql)){
		header("location:pedidos.php");
	}
	$errores = array("Error al borrar el registro");
	
}
//lee la tabla productos
if ($m=="S") {
	$sql = "SELECT num, estado, sum(precio) as importe, sum(cantidad) as cantidad, sum(descuento) as descuento, sum(envio) as envio, idUsuario, fecha FROM carrito GROUP BY num ORDER BY fecha";
	$r = mysqli_query($conn, $sql);
	$pedidos = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($pedidos, $data);
	}
}
//lee un producto antes de ser borrado
if ($m=="B") {
	$carrito = $_GET["id"];
}
?>



 ?>



<?php include_once 'template/header.php'; ?>
<?php include_once 'template/navbar.php'; ?>



<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-1  col-md-1 sidenav" >
			

		</div>
		<div class="col-sm-10 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Tabla pedidos</h2>
				<?php
				if(count($errores)>0){
					print '<div class="alert alert-danger">';
					foreach ($errores as $key => $valor) {
						print "<strong>* ".$valor."</strong>";
					}
					print '</div>';
				}
				//Mostramos el pedido antes de ser borrado
				if($m=="B"){
					print '<div class="alert alert-danger">';
					print "¿Desea borrar este pedido? ";
					print "<a href='pedidos.php'>No</a>&nbsp;";
					print "<a href='pedidos.php?m=D&id=".$carrito."'>Si</a>";
					print "<p>Los datos del pedido se traspasarán al histórico.</p>";
					print "</div>";
					despliegaCarritoConsulta($carrito, $conn);
				} 
				if ($m=="S") {
					print '<div class="table-responsive">';
					print "<table class='table table-striped ' width='100%'>";
					print "<tr>";
					print "<th>Estado</th>";
					print "<th>Importe</th>";
					print "<th>Cant. prod.</th>";
					print "<th>Descuento</th>";
					print "<th>Envío</th>";
					print "<th>Total</th>";
					print "<th>Cliente</th>";
					print "<th>Fecha</th>";
					print "<th>Borrar</th>";
					print "</tr>";
					for ($i=0; $i < count($pedidos) ; $i++) {
						$total = $pedidos[$i]["importe"]-$pedidos[$i]["descuento"]+$pedidos[$i]["envio"];
						if($pedidos[$i]["estado"]=="0"){
							print "<tr class='warning'>";
							print "<td>";
							print "Abierto";
						}
						if($pedidos[$i]["estado"]=="1"){
							print "<tr class='success'>";
							print "<td>";
							print "Aprobado";
						}
						print "</td>";
						print "<td> $".number_format($pedidos[$i]["importe"],2)."</td>";
						print "<td>".number_format($pedidos[$i]["cantidad"])."</td>";
						print "<td> $".number_format($pedidos[$i]["descuento"],2)."</td>";
						print "<td> $".number_format($pedidos[$i]["envio"],2)."</td>";
						print "<td> $".number_format($total,2)."</td>";
						print "<td>".$pedidos[$i]["idUsuario"]."</td>";
						print "<td> ".$pedidos[$i]["fecha"]."</td>";
						print "<td><a class='btn btn-danger' href='pedidos.php?m=B&id=".$pedidos[$i]["num"]."'>Borrar</a></td>";
						print "</tr>";
					}
					print "</table>";
					print '</div> ';
				}
				?>
			</div>
		</div>
		
	</div>
</div>



<?php include_once 'template/footer.php'; ?>