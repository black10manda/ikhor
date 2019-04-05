<?php
ini_set('error_reporting',0); 
if (isset($_POST["email"])) {
	$email = $_POST["email"];
	$clave = $_POST["clave"];
	$clave2 = hash_hmac("sha512",$clave,"<3Stacy&&Juan<3");
	$recordarme = $_POST["recordarme"];
	//Recuérdame
	$nombre = "datos";
	$valor = $email."|".$clave;
	if($recordarme=="on"){
		$fecha = time() + (60*60*24*7);
	} else {
		$fecha = time() - 1;
	}
	setcookie($nombre, $valor, $fecha);
	//
	//Creamos el query
	$sql = "SELECT * FROM usuarios WHERE email='".$email."' AND clave='".$clave2."'";
	$r = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($r);
	//Clave y usuario correcto
	if($n==1){
		//Pasamos los datos a un objeto
		$usuario = mysqli_fetch_assoc($r);
		//Iniciar la sesion
		session_start();
		//Creamos la variable de sesion
		$_SESSION['usuario']=$usuario;
		//Saltamos a index

		header("location:".$saltaPagina);
	} else {
		$error = "Clave de acceso o correo electrónico incorrectos ". $clave." ". $clave2;
		
	}
}
$datos = $_COOKIE["datos"];
$email = "";
$clave = "";
$recordarme = "";
if(isset($datos)){
	$aDatos = explode("|", $datos);
	$email = $aDatos[0];
	$clave = $aDatos[1];
	$recordarme = "checked";
}

?>