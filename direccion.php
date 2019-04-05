
<?php $title = 'Datos de envio'; ?>
<?php $currentPage = 'index'; ?>


<?php require "php/session.php";
require "php/conn.php";?>

<?php  
if(!isset($_SESSION["usuario"])){
	header("location:loginE.php");
	exit;
}
if(isset($_POST["nombre"])){
	//Recuperamos el identificador
	$id = $_SESSION["usuario"]["id"];
	//Recuperamos la información del usuario
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$correo = $_POST["correo"];
	$direccion = $_POST["direccion"];
	$ciudad = $_POST["ciudad"];
	$colonia = $_POST["colonia"];
	$estado = $_POST["estado"];
	$codpos = $_POST["codpos"];
	$pais = $_POST["pais"];
	//Armamos el SQL
	$sql = "UPDATE usuarios SET ";
	$sql .= "nombre='".$nombre."', ";
	$sql .= "apellido='".$apellido."', ";
	$sql .= "email='".$correo."', ";
	$sql .= "direccion='".$direccion."', ";
	$sql .= "ciudad='".$ciudad."', ";
	$sql .= "estado='".$estado."', ";
	$sql .= "colonia='".$colonia."', ";
	$sql .= "codpos='".$codpos."', ";
	$sql .= "pais='".$pais."' ";
	$sql .= "WHERE id=".$id;
	//Ejecutamos el sql
	if(mysqli_query($conn, $sql)){
		//Leemos el registro del usuario
		$sql = "SELECT * FROM usuarios WHERE id=".$id;
		$r = mysqli_query($conn, $sql);
		//pasamos los datos a un objeto
		$usuario = mysqli_fetch_assoc($r);
		//Actualizamos la variable de sesion
		$_SESSION["usuario"]=$usuario;
		//Saltamos a la página de pago
		header("location:pago.php");
		exit;
	}

}
//variables de trabajo
$nombre = $_SESSION["usuario"]["nombre"];
$apellido = $_SESSION["usuario"]["apellido"];
$correo = $_SESSION["usuario"]["email"];
$direccion = $_SESSION["usuario"]["direccion"];
$ciudad = $_SESSION["usuario"]["ciudad"];
$colonia = $_SESSION["usuario"]["colonia"];
$estado = $_SESSION["usuario"]["estado"];
$codpos = $_SESSION["usuario"]["codpos"];
$pais = $_SESSION["usuario"]["pais"];
?>
<?php 

require "php/laterales.php";
require "php/carrito.php"; 
include_once 'template/header.php'; 
?>
<?php include_once 'template/navbar.php'; ?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<ol class="breadcrumb">
					<li><a href="checkout.php">Iniciar sesión</a></li>
					<li class="active">Datos de envío</li>
					<li>Forma de pago</li>
					<li>Revisar</li>
				</ol>
				<h2 class="text-center">Datos de envio</h2>
				<p>Favor de verificar los sigiuientes datos de envio:</p>
				<form action="direccion.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value="<?php print $nombre; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="apellido">* Apellido:</label>
						<input type="text" name="apellido" id="apellido" class="form-control" required placeholder="Escriba su apellido "value="<?php print $apellido; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="correo">* Correo electrónico:</label>
						<input type="email" name="correo" id="correo" class="form-control" placeholder="Escriba su correo electrónico" value="<?php print $correo; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="direccion">* Dirección:</label>
						<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escriba su dirección" value="<?php print $direccion; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="ciudad">* Ciudad:</label>
						<input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Escriba su ciudad" value="<?php print $ciudad; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="colonia">* Colonia:</label>
						<input type="text" name="colonia" id="colonia" class="form-control" placeholder="Escriba su colonia" value="<?php print $colonia; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="estado">* Estado:</label>
						<input type="text" name="estado" id="estado" class="form-control" placeholder="Escriba su estado" value="<?php print $estado; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="codpos">* Código Postal:</label>
						<input type="text" name="codpos" id="codpos" class="form-control" placeholder="Escriba su código postal" value="<?php print $codpos; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="pais">* País:</label>
						<input type="text" name="pais" id="pais" class="form-control" placeholder="Escriba su país" value="<?php print $pais; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>

				</form>
			</div>
		</div>
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos nuevos</h4>
			<?php nuevos($conn); ?>
		</div>
	</div>
</div>



<br><br>
<?php include_once 'template/footer.php'; ?>