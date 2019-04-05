<?php 
ini_set('error_reporting',0);
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}

 ?>
<?php $title = 'CPanel'; ?>
<?php $currentPage = 'Usuarios'; ?>
<?php require "../php/conn.php";
	  require "../php/funciones.php";?>
<?php include_once 'template/header.php'; ?>
<?php 

if (isset($_GET["m"])) {
	$m = $_GET["m"];
} else {
	$m = "S";
}
//lee la tabla productos
if ($m=="D") {
	$id = $_GET["id"];
	//Verificar que el usuario no tenga ningún registro en la tabla "carrito"
	$sql = "SELECT count(*) as num FROM carrito WHERE idUsuario=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
	$n = (mysqli_num_rows($r)==1)? $data["num"] : 0;
	if($n>0){
		$errores = array("Este usuario tiene ".$n." registros en el carrito de compras.");
		$m = "S";
	} else {
		//Borramos el registro
		$sql = 'CALL sp_deleteUSer('.$id.')';
		if(mysqli_query($conn, $sql)){
			header('location:usuarios.php');
		}
		$errores = array('Error al borrar el registro'); 

	}
	
}
if ($m=="B") {
	$id = $_GET["id"];
}
//Detectamos si se envía la información
if(isset($_POST["nombre"])){
	//Recuperamos el identificador
	$id = $_POST["id"];
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
	$pass=$_POST["usuario"]["clave"];
	//Armamos el SQL
	$sql = "CALL sp_updateUser (";
	$sql .= "'".$id."',";
	$sql .= "'".$nombre."', ";
	$sql .= "'".$apellido."', ";
	$sql .= "'".$correo."', ";
	$sql .= "'".$direccion."', ";
	$sql .= "'".$ciudad."', ";
	$sql .= "'".$colonia."', ";
	$sql .= "'".$estado."', ";
	$sql .= "'".$codpos."', ";
	$sql .= "'".$pais."') ";
	
	//Ejecutamos el sql
	if(mysqli_query($conn, $sql)){
		//Saltamos a la página de pago
		header("location:usuarios.php");
		exit;
	}
}
//lee la tabla productos
if ($m=="S") {
	$sql = "SELECT * FROM usuarios";
	$r = mysqli_query($conn, $sql);
	$usuarios = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($usuarios, $data);
	}
}
//lee un producto
if ($m=="C") {
	$id = $_GET["id"];
	//Leemos el registro del usuario
	$sql = "SELECT * FROM usuarios WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	//pasamos los datos a un objeto
	$data = mysqli_fetch_assoc($r);
	//Variables de trabajo
	$nombre = $data["nombre"];
	$apellido = $data["apellido"];
	$correo = $data["email"];
	$direccion = $data["direccion"];
	$ciudad = $data["ciudad"];
	$colonia = $data["colonia"];
	$estado = $data["estado"];
	$codpos = $data["codpos"];
	$pais = $data["pais"];
}

 ?>
<?php include_once 'template/navbar.php'; ?>



<div class="container-fluid text-center">
	
	<div class="row content">
		<div class="col-xs-1  col-md-1 sidenav" >
			

		</div>
		<div class="col-sm-10 text-left">
			<div class="well" id="contenedor">
				<h2 class="text-center">ABC tabla usuarios</h2>

				<?php
				if(count($errores)>0){
					print '<div class="alert alert-danger">';
					foreach ($errores as $key => $valor) {
						print "<strong>* ".$valor."</strong>";
					}
					print '</div>';
				}
				if($m=="B"){
					print '<div class="alert alert-danger">';
					print "¿Desea borrar el usuario? ";
					print "<a href='usuarios.php'>No</a>&nbsp;";
					print "<a href='usuarios.php?m=D&id=".$id."'>Si</a>";
					print "</div>";
				} 
				if($m=="C"){
					
				?>
				<form action="usuarios.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Escriba su nombre" value="<?php print $nombre; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="apellido">* Apellido Paterno:</label>
						<input type="text" name="apellido" id="apellido" class="form-control" required placeholder="Escriba su apellido paterno"  value="<?php print $apellido; ?>"/>
					</div>


					<div class="form-group text-left">
						<label for="correo">* Correo electrónico:</label>
						<input type="email" name="correo" id="correo" class="form-control" placeholder="Escriba su correo electrónico"  value="<?php print $correo; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="direccion">* Dirección:</label>
						<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escriba su dirección"  value="<?php print $direccion; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="ciudad">* Ciudad:</label>
						<input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Escriba su ciudad"  value="<?php print $ciudad; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="colonia">* Colonia:</label>
						<input type="text" name="colonia" id="colonia" class="form-control" placeholder="Escriba su colonia"  value="<?php print $colonia; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="estado">* Estado:</label>
						<input type="text" name="estado" id="estado" class="form-control" placeholder="Escriba su estado"  value="<?php print $estado; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="codpos">* Código Postal:</label>
						<input type="text" name="codpos" id="codpos" class="form-control" placeholder="Escriba su código postal"  value="<?php print $codpos; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="pais">* País:</label>
						<input type="text" name="pais" id="pais" class="form-control" placeholder="Escriba su país"  value="<?php print $pais; ?>"/>
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
					print "<th>Apellido </th>";
					
					print "<th>Modificar</th>";
					print "<th>Borrar</th>";
					print "</tr>";
					for ($i=0; $i < count($usuarios) ; $i++) { 
						print "<tr>";
						print "<td>".$usuarios[$i]["id"]."</td>";
						print "<td>".$usuarios[$i]["nombre"]."</td>";
						print "<td>".$usuarios[$i]["apellido"]."</td>";
						print "<td><a class='btn btn-info' href='usuarios.php?m=C&id=".$usuarios[$i]["id"]."'>Modificar</a></td>";
						print "<td><a class='btn btn-danger' href='usuarios.php?m=B&id=".$usuarios[$i]["id"]."'>Borrar</a></td>";
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
</div>


<?php include_once 'template/footer.php'; ?>