
<?php $title = 'Vida Rosa'; ?>
<?php $currentPage = 'login'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/laterales.php";
?>

<?php 
require "php/conn.php"; 
require "php/carrito.php";
include_once 'template/navbar.php';
if (isset($_POST["email"])) {
	$email = $_POST["email"];
	//Buscar el correo en la base de datos
	$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	if($n==1){
		$data = mysqli_fetch_assoc($r);
		$id = $data["id"];
		//
		$mensaje = "Entra a la siguiente liga para cambiar tu clave de acceso.<br>";
		$mensaje .= "<a href='localhost/IKHOR/cambiaclave.php?id=".$id.">Cambia clave de acceso</a>";
		
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type:text/html; charset=UTF-8\r\n"; 
		$headers .= "From: Vida Rosa\r\n"; 
		$headers .= "Repaly-to: $email\r\n";
		
		$asunto = "Cambiar la clave de acceso";
		
		if(mail($email, $asunto, $mensaje,$headers)){
			header("location:olvidoGracias.php");
		} else {
			$error = "Error en el envío de su correo, intentarlo más tarde";
		}

	} else {
		$error = "El correo no existe en la base de datos";
	}

}


 ?>





<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>

		</div>
		<div class="col-sm-8 text-center">
			<div class="well" id="contenedor">
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2>¿Olvidó la clave de acceso?</h2>
				<form action="olvido.php" method="post" class="text-left">
					<div class="form-group">
						<label for="email">Correo electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Escribe tu correo electrónico">
					</div>

					<div class="form-group text-left">
						<label for="entrar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
			<div class="well text-left" id="contenedor" >
				<a href="registro.php" class="btn btn-info">Registrarte en el sitio</a>
			</div>
		</div>
		<div class="col-xs-12  col-md-2 sidenav">
			<h4>Productos nuevos</h4>
			<?php nuevos($conn); ?>
		</div>
	</div>
</div>


<br><br>
<?php include_once 'template/footer.php'; ?>