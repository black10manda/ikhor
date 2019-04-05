
<?php $title = 'Contacto'; ?>
<?php $currentPage = 'contacto'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/laterales.php";
?>
<?php require "php/carrito.php"; 
if (isset($_POST["nombre"])) {
 	$nombre=$_POST["nombre"];
 	$email=$_POST["email"];
 	$asunto=$_POST["asunto"];
 	$mensaje=$_POST["mensaje"];
 	
//Validacion de campos
 	if ($nombre=="") {
 		$errores[0]="El nombre del usuario es requerido";
 	} else if ($email==""){
 		$errores[0]="El email del usuario es requerido";
 	} else if ($asunto==""){
 		$errores[1]="El asunto del usuario es requerido";
 	} else if ($mensaje==""){
 		$errores[2]="la mensaje del usuario es requerido";
 	} else{
 		
 		
 			# code...
 			//inserta datos
 			
 			$sql="CALL sp_addContacto (0,";
 			$sql .= "'".$nombre."' , '".$email."', ";
 			$sql .= "'".$asunto."' , '".$mensaje."');";

 			if(mysqli_query($conn, $sql)){
 				
 				header("location:contactoGracias.php");
 			} else{
 				
 				$errores[9]="Error al comentar";
 			}
 		
 		
 	}
 }
 	
function validaCorreo($email, $conn){
	$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
	$r= mysqli_query($conn, $sql);
	$n= mysqli_num_rows($r);
	$bandera=($n==0)? true : false;
	return $bandera;
}
 



 ?>



?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
		<?php masVendidos($conn); ?>
			
		</div>
		<div class="col-sm-5 text-left">
			<div class="well" id="contenedor">
				<h2>Gracias por contactarnos</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut massa eget odio porttitor rutrum. Aliquam vulputate lacus sem, non congue mauris venenatis id. Praesent elementum in purus ut dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec sodales ligula. Duis lobortis hendrerit enim, condimentum accumsan purus pellentesque ac. Phasellus neque nisl, scelerisque vel leo ac, condimentum sodales mauris.</p>
				<a href="index.php" class="btn btn-success" role="button">Regresar</a>
				
			</div>
		</div>
		<div class="col-sm-5 sidenav">
		<h4>Visitanos</h4>
		<div class="well">
			<iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1874.2105436732022!2d-100.72357952312468!3d20.032797628975406!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x74235446a27332a2!2sArgue+Web!5e0!3m2!1ses!2smx!4v1521091727850" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		</div>
	</div>
</div>


<br><br>
<?php include_once 'template/footer.php'; ?>