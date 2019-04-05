
<?php $title = 'Cpanel'; ?>
<?php $currentPage = 'Contacto' ?>
<?php 
ini_set('error_reporting',0);
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}
?>

<?php require "../php/conn.php";
	  require "../php/funciones.php";?>
<?php include_once 'template/header.php'; ?>

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
if ($m=="B") {
	$id = $_GET["id"];
	
		//Borramos el registro
		$sql = 'CALL sp_deleteContacto ('.$id.")";
		if(mysqli_query($conn, $sql)){
			header('location:contactoCUD.php');
		}
		$errores = array('Error al borrar el registro'); 

}
	

//Detectamos si se envía la información
if(isset($_POST["nombre"])){
	//Recuperamos el identificador
	$id = $_POST["id"];
	//Recuperamos la información del usuario
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$asunto = $_POST["asunto"];
	$mensaje = $_POST["mensaje"];
	$atendido = $_POST["atendido"];
	//Armamos el SQL
	
		# code...
	$sql = "CALL sp_updateContacto (";
	$sql .= "'".$id."' ,";
	$sql .= "'".$nombre."', ";
	$sql .= "'".$email."', ";
	$sql .= "'".$asunto."', ";
	$sql .= "'".$mensaje."', ";
	$sql .= "'".$atendido."' )";
	
	echo $sql;
	//Ejecutamos el sql
	if(mysqli_query($conn, $sql)){
		//Saltamos a la página de pago
		header("location:contactoCUD.php");
		exit;
	}

}
//lee la tabla productos
if ($m=="S") {
	$sql = "SELECT * FROM contacto";
	$r = mysqli_query($conn, $sql);
	$usuarios = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($usuarios, $data);
	}
}
if ($m=="A" || $m=="C") {
	//Leyendo toda la tabla
	$sql = "SELECT id,nombre FROM contacto ORDER BY nombre";
	$r = mysqli_query($conn, $sql);
	$productos = array();
	while($row = mysqli_fetch_assoc($r)){
		array_push($productos, $row);
	}
}
//lee un producto
if ($m=="C") {
	$id = $_GET["id"];
	//Leemos el registro del usuario
	$sql = "SELECT * FROM contacto WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	//pasamos los datos a un objeto
	$data = mysqli_fetch_assoc($r);
	//Variables de trabajo
	$nombre = $data["nombre"];
	$email = $data["email"];
	$asunto = $data["asunto"];
	$mensaje = $data["mensaje"];
	$atendido = $_POST["atendido"];

	
}

 ?>

<?php include_once 'template/navbar.php'; ?>
<div class="container-fluid text-center">
	
	<div class="row content">
		<div class="col-xs-1  col-md-1 sidenav" >
			

		</div>
		<div class="col-sm-10 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">Comentarios</h2>
				<?php
				if(count($errores)>0){
					print '<div class="alert alert-danger">';
					foreach ($errores as $key => $valor) {
						print "<strong>* ".$valor."</strong>";
					}
					print '</div>';
				}
				if($m=="C"){
					
				?>
				<form action="contactoCUD.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value="<?php print $nombre; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="email">* Email:</label>
						<input type="text" name="email" id="email" class="form-control" required placeholder="Escriba su email paterno"  value="<?php print $email; ?>"/>
					</div>


					<div class="form-group text-left">
						<label for="asunto">* Asunto</label>
						<input type="text" name="asunto" id="asunto" class="form-control" placeholder="Escriba su asunto electrónico"  value="<?php print $asunto; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="mensaje">* mensaje:</label>
						<input type="text" name="mensaje" id="mensaje" class="form-control" placeholder="Escriba su dirección"  value="<?php print $mensaje; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="atendido">* atendido:</label>
						<input type="text" name="atendido" id="atendido" class="form-control" placeholder=""  value="<?php print $atendido; ?>"/>
					</div>


					<input type="hidden" id="id" name="id" value="<?php print $id; ?>">

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>

				</form>
				<?php } 
				if ($m=="S") {
					print "<table class='table table-striped' width='100%'>";
					print "<tr>";
					print "<th>id</th>";
					print "<th>Nombre</th>";
					print "<th>Email </th>";
					print "<th>Asunto </th>";
					print "<th>Mensaje </th>";
					print "<th>Atendido </th>";
					print "<th>Modificar</th>";
					print "<th>Borrar</th>";
					print "</tr>";
					for ($i=0; $i < count($usuarios) ; $i++) { 
						print "<tr>";
						print "<td>".$usuarios[$i]["id"]."</td>";
						print "<td>".$usuarios[$i]["nombre"]."</td>";
						print "<td>".$usuarios[$i]["email"]."</td>";
						print "<td>".$usuarios[$i]["asunto"]."</td>";
						print "<td>".$usuarios[$i]["mensaje"]."</td>";
						print "<td>".$usuarios[$i]["atendido"]."</td>";

						print "<td><a class='btn btn-info' href='contactoCUD.php?m=C&id=".$usuarios[$i]["id"]."'>Modificar</a></td>";
						print "<td><a name='borrar' id='borrar' class='btn btn-danger' href='contactoCUD.php?m=B&id=".$usuarios[$i]["id"]."' >Borrar</a></td>";
						print "</tr>";
					}
					print "</table>";
				}
				?>
			</div>
		</div>
		<!--
		usuarios.php?m=B&id=".$usuarios[$i]["id"]."
		usuarios.php?m=B&id="+id,"_self-->
	</div>
<

<?php include_once 'template/footer.php'; ?>