
<?php $title = 'IKHOR'; ?>
<?php $currentPage = 'index';
require "php/session.php"; ?>
<?php 
include_once 'template/header.php'; 
require "php/conn.php";
$sql = "SELECT * FROM productos ORDER BY nuevos DESC, fecha";
$r = mysqli_query($conn, $sql);
$productos = array();
while($row = mysqli_fetch_array($r)){
	array_push($productos, $row);
}
?>
<?php 
require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>


<div class="jumbotron ">
	<div class="container text-center">
		<h1 style="padding: 20px;">IKHOR S.A</h1>
		<h3 style="padding: 20px;">Empresa productora de vino de manera artesanal.</h3>

	</div>
	
</div>
<div class="container-fluid bg-3 text-center" >
<div class="row">
	<div class="col-sm-6 text-center well" >   
            <img style="width: 100%; " src="img/Productoss.jpg" class="  ">    
	</div>
	<div class="col-sm-6 text-left">
		<h3 style="padding: 95px; text-align: justify;   ">IKHOR S.A. es una empresa productora de vino, fundada en 	el año 2018, dedicada a  al  elaboración de vino de manera artesanal, ubicada en la ciudad de Acámbaro, 	Guanajuato.
		</h3>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<video src="videos/video.mp4" controls=""></video>
	</div>
	<div class="col-sm-6">
		<h2>DESCRIPCIÓN DE LA EMPRESA </h2>
		<!--iframe src="edge/galeria3.html" style="width: 71%; height: 600px"></iframe-->
		<h3 style="padding: 95px; text-align: justify;   ">Somos la primera empresa productora de vino de manera artesanal en la región, comenzamos elaborando vino rosado debido a que este es el más dulce de cualquier categoría, al mismo tiempo que es el más llamativo visualmente.</h3>
	</div>
</div>


	<h2>Producto</h2>
	<?php
	$ren = 0;
	for ($i=0; $i < 1 ; $i++) { 
		if ($ren==0) {
			print '<div class="row">';
		}
		print '<div class="col-sm-5 " style="height: 390px;">';
		print '</div>';
		

		print '<div class="col-sm-3 well" style="width: 10%; ">';
		print '<img src="img/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%; height: 90%;" alt="'.$productos[$i]["nombre"].'">';
		print '<p><a href="producto.php?id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></p>';
		print '</div>';

		print '<div class="col-sm-4 " style="height: 390px;">';
		print '</div>';
		$ren++;
		if ($ren==1) {
			$ren = 0;
			print "</div>";
		}
		
	}
	?>
	
</div> <br>


<br><br>
<?php include_once 'template/footer.php'; ?>