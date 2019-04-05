<?php $title = 'Cambiar Contraseña'; ?>
<?php $currentPage = 'Cambiar Contraseña'; ?>
<?php require "php/session.php"; 
include_once 'template/header.php'; 
require "php/conn.php";?>
<?php require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; 
//Detectamos si se envía la información
if(isset($_GET["id"])){
	$id = $_GET["id"];
	//Leer los datos del usuario
	$sql = "SELECT * FROM usuarios WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	if($n!=1){
		//No existe ese usuario
		header("location:index.php");
	}
}
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$clave1 = $_POST["clave1"];
	$clave2 = $_POST["clave2"];
	//verificamos las claves
	if ($clave1==$clave2) {
		$clave = hash_hmac("sha512",$clave1,"<3Stacy&&Juan<3");
		$sql = "UPDATE usuarios SET clave='".$clave."' WHERE id=".$id;
		if(mysqli_query($conn, $sql)){
			header("location:cambiaClaveGracias.php");
		} else {
			$error = "Error al actualizar la clave de acceso";
		}
	} else {
		$error = "Las claves de acceso no coinciden";
	}
}
?>



<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<h4>Productos más vendidos</h4>
			
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2 class="text-center">Cambia clave de acceso</h2>
				<form action="cambiaclave.php" method="post">

					<div class="form-group text-left">
						<label for="clave1">* Clave de acceso:</label>
						<input type="password" name="clave1" id="clave1" class="form-control" placeholder="Escriba su clave de acceso"/>
					</div>

					<div class="form-group text-left">
						<label for="clave2">* Repetir clave de acceso:</label>
						<input type="password" name="clave2" id="clave2" class="form-control" placeholder="Confirme su clave de acceso"/>
					</div>

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>

					<input type="hidden" name="id" id="id" value="<?php print $id; ?>">

				</form>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		<h4>Productos nuevos</h4>
		
		</div>
	</div>
</div>



<br><br>
<?php include_once 'template/footer.php'; ?>