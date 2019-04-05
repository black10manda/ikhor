
<?php 
 require "php/conn.php";     //mandar llamar un archivo php require
 require "php/session.php";
 require "php/laterales.php";
 require "php/carrito.php";
 $title = 'Registrar'; 

 $currentPage = 'login';
 
//detectamos si se envia la informacion de manera correcta a la base de datos del formulario registro usuario
 if (isset($_POST["nombre"])) {
 	$nombre=$_POST["nombre"];
 	$apellido=$_POST["apellido"];
 	$email=$_POST["email"];
 	$direccion=$_POST["direccion"];
 	$ciudad=$_POST["ciudad"];
 	$colonia=$_POST["colonia"];
 	$estado=$_POST["estado"];
 	$codpos=$_POST["codpos"];
 	$pais=$_POST["pais"];
 	$clave1 = $_POST["clave1"];
	$clave2 = $_POST["clave2"];
 	$errores=array();

//Validacion de campos
 	if ($nombre=="") { //si se esta vacio algun campo
 		$errores[0]="El nombre del usuario es requerido";  //es un array y el cero es que se encuentra en esa pisicion 
 	} else if ($apellido==""){
 		$errores[0]="El apellido del usuario es requerido";
 	} else if ($email==""){
 		$errores[1]="El email del usuario es requerido";
 	} else if ($direccion==""){
 		$errores[2]="la direccion del usuario es requerido";
 	} else if ($ciudad==""){
 		$errores[3]="El ciudad del usuario es requerido";
 	} else if ($colonia==""){
 		$errores[4]="El colonia del usuario es requerido";
 	} else if ($estado==""){
 		$errores[5]="El estado del usuario es requerido";
 	} else if ($codpos==""){
 		$errores[6]="El codpos del usuario es requerido";
 	} else if ($pais==""){
 		$errores[7]="El pais del usuario es requerido";
 	} else if ($clave1!==$clave2) {
		$errores[10]="Las claves de acceso no coinciden";
	} else{
 		//valida que el correo no exista 2 veces
 		if (validaCorreo($email, $conn)) {
 			# code...
 			//inserta datos en la tabla
 			$clave = hash_hmac("sha512",$clave1,"<3Stacy&&Juan<3");  //sql es la sentencia sql
 			$sql="CALL sp_addUser  (0,";
 			$sql .= "'".$nombre."' , '".$apellido."', ";
 			$sql .= "'".$email."' , '".$direccion."', ";
 			$sql .= "'".$ciudad."' , '".$colonia."', ";
 			$sql .= "'".$estado."' , '".$codpos."', ";
 			$sql .= "'".$pais."', '".$clave."');";

 			if(mysqli_query($conn, $sql)){   //msqli Realiza una consulta a la base de datos si si esta bien manda a registrogracias
 				
 				header("location:registroGracias.php");
 			} else {
 				
 				$errores[9]="Error al Registrar";
 			}
 		} else{
 			$errores[8]="Ya se ha utilizado este email";
 			
 		}
 		
 	}
 }
 	
function validaCorreo($email, $conn){
	$sql = "SELECT * FROM usuarios WHERE email='".$email."'";  //buscar dentro de la tabla usuario el correo 
	$r= mysqli_query($conn, $sql); //recibe el resultado
	$n= mysqli_num_rows($r); //numero de renglones de resultado
	$bandera=($n==0)? true : false;  //boleano     :de lo contrario 
	return $bandera;
}
 

include_once 'template/header.php';

 include_once 'template/navbar.php'; 

 ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>

		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">

				
					<?php 
					if (count($errores)>0) {
						print('<div class="alert alert-danger">');
						foreach ($errores as $key => $valor) {
							print "<strong>".$valor."</strong>";
						}
						print('</div>');
					}
					

					 ?>
				


				<h2 class="text-center">Registro</h2>
				<p>Favor de capturar los siguientes datos:</p>
				<form action="registro.php" method="post">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Escriba su nombre"/>
					</div>

					<div class="form-group text-left">
						<label for="apellido">* Apellido:</label>
						<input type="text" name="apellido" id="apellido" class="form-control"  placeholder="Escriba su apellido "/>
					</div>

					<div class="form-group text-left">
						<label for="email">* Correo electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Escriba su correo electrónico"/>
					</div>
					<div class="form-group text-left">
						<label for="clave1">* Clave de acceso:</label>
						<input type="password" name="clave1" id="clave1"  class="form-control" placeholder="Escriba su clave de acceso"/>
					</div>

					<div class="form-group text-left">
						<label for="clave2">* Repetir clave de acceso:</label>
						<input type="password" name="clave2" id="clave2"  class="form-control" placeholder="Confirme su clave de acceso"/>
					</div>

					<div class="form-group text-left">
						<label for="direccion">* Dirección:</label>
						<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escriba su dirección"/>
					</div>

					<div class="form-group text-left">
						<label for="ciudad">* Ciudad:</label>
						<input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Escriba su ciudad"/>
					</div>

					<div class="form-group text-left">
						<label for="colonia">* Colonia:</label>
						<input type="text" name="colonia" id="colonia" class="form-control" placeholder="Escriba su colonia"/>
					</div>

					<div class="form-group text-left">
						<label for="estado">* Estado:</label>
						<input type="text" name="estado" id="estado" class="form-control" placeholder="Escriba su estado"/>
					</div>

					<div class="form-group text-left">
						<label for="codpos">* Código Postal:</label>
						<input type="text" name="codpos" id="codpos" class="form-control" placeholder="Escriba su código postal"/>
					</div>

					<div class="form-group text-left">
						<label for="pais">* País:</label>
						<input type="text" name="pais" id="pais" class="form-control" placeholder="Escriba su país"/>
					</div>

					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>

				</form>
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