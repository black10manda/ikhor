<?php $title = 'CPanel'; ?>
<?php $currentPage = 'Cambia'; ?>
<?php
//Iniciar la sesion
session_start();
//
if(!isset($_SESSION["admon"])){
	header("location:index.php");
}
require "../php/conn.php";

if(isset($_POST["clave1"])){
	$clave1 = $_POST["clave1"];
	$clave2 = $_POST["clave2"];
	//verificamos las claves
	if ($clave1==$clave2) {
		$clave = hash_hmac("sha512",$clave1,"<3Stacy&&Juan<3");
		$sql = "UPDATE admon SET clave='".$clave."' WHERE id=1";
		print $sql;
		if(mysqli_query($conn, $sql)){
			header("location:index.php");
		} else {
			$error = "Error al actualizar la clave de acceso";
		}
	} else {
		$error = "Las claves de acceso no coinciden";
	}
}


?>


<?php include_once 'template/header.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
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
				<form action="cambiaClave.php" method="post">

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

					<input type="hidden" id="id" name="id" value="<?php print $id; ?>">

				</form>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		</div>
	</div>
</div>









<?php include_once 'template/footer.php'; ?>