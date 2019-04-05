<?php $title = 'CPanel'; ?>
<?php $currentPage = 'Productos'; ?>
<?php
require "../php/conn.php";
if(isset($_POST["usuario"])){
	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
	//$clave = substr(hash_hmac("sha512",$clave,"<3Stacy&&Juan<3"),0,50);
	//Creamos el query
	$sql = "SELECT * FROM admon WHERE usuario='".$usuario."' AND clave='".$clave."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	if($n==1){
		//Iniciar la sesion
		session_start();
		//Creamos la variable de sesion
		$_SESSION['admon']=$usuario;
		//Saltamos a index
		header("location:productosCRUD.php");
	} else {
		$error = "Usuario o clave de acceso errónea";
	}
}
?>
<?php include_once 'template/header.php'; ?>
<br><br><br>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-4 sidenav">
			
		</div>
		<div class="col-sm-5 text-center">
			<div class="well" id="contenedor">
				<?php
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>* ".$error."</strong>";
						print '</div>';
					}
				?>
				<h2>Iniciar sesión administrativa</h2>
				<form class="text-left" action="index.php" method="post">
					<div class="form-group">
						<label for="usuario">Usuario:</label>
						<input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Escribe tu usuario administrativo">
					</div>
					<div class="form-group">
						<label for="clave">Clave de acceso:</label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Escribe tu clave de acceso">
					</div>

					<div class="form-group text-left">
						<label for="entrar"></label>
						<input type="submit" name="entrar" value="Entrar" class="btn btn-success" role="button"/>
					</div>

				</form>
			</div>
		</div>
		<div class="col-sm-4 sidenav">
		</div>
	</div>
</div>


<?php include_once 'template/footer.php'; ?>