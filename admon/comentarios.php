<?php 
ini_set('error_reporting',0);
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}

 ?>
<?php $title = 'CPanel'; ?>
<?php $currentPage = 'Comentarios'; ?>
<?php require "../php/conn.php";
	  require "../php/funciones.php";?>
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
if ($m=="D") {
	$id = $_GET["id"];
	//Verificar que el usuario no tenga ningún registro en la tabla "comentario"
	$sql = "SELECT * FROM comentario WHERE num='".$id."'";
	$r = mysqli_query($conn, $sql);
	//Trasladamos los registros a la tabla histórica
	
	//Borramos el registro
	$sql = "CALL sp_deleteComentario('".$id."')";
	if(mysqli_query($conn, $sql)){
		header("location:comentarios.php");
	}
	$errores = array("Error al borrar el registro");
	
}
//lee la tabla productos
if ($m=="S") {
	$sql = "SELECT * FROM comentario";
	$r = mysqli_query($conn, $sql);
	$comentarios = array();
	while($data = mysqli_fetch_assoc($r)){
		array_push($comentarios, $data);
	}
}
//lee un producto antes de ser borrado
if ($m=="B") {
	$carrito = $_GET["id"];
}

if ($m=="C") {
	$id = $_GET["id"];
	$sql = "CALL sp_uupdateComentario( ".$id." , 1)";
	print $sql;
	if(mysqli_query($conn, $sql)){
			//print "El registro se insertó correctamente";
		header("location: comentarios.php");	 
		} else {
			print "Error al insertar el registro";
		}


}
?>



 ?>



<?php include_once 'template/header.php'; ?>
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
				//Mostramos el pedido antes de ser borrado
				if($m=="B"){
					print '<div class="alert alert-danger">';
					print "¿Desea borrar el comentario? ";
					print "<a href='comentarios.php'>No</a>&nbsp;";
					print "<a href='comentarios.php?m=D&id=".$carrito."'>Si</a>";
					print "</div>";
				} 
				if ($m=="S") {
					print "<table class='table table-striped' width='100%'>";
					print "<tr>";
					print "<th>Estado</th>";
					print "<th>Id</th>";
					print "<th>Usuario.</th>";
					print "<th>Comentario</th>";
					print "<th>Accion</th>";
					print "</tr>";
					for ($i=0; $i < count($comentarios) ; $i++) {
						
						if($comentarios[$i]["publicado"]=="0"){
							print "<tr class='warning'>";
							print "<td>";
							print "Pendiente";
						}
						if($comentarios[$i]["publicado"]=="1"){
							print "<tr class='success'>";
							print "<td>";
							print "Aprobado";
						}
						print "</td>";
						print "<td> ".number_format($comentarios[$i]["id"])."</td>";
						print "<td>".$comentarios[$i]["usuario"]."</td>";
						print "<td> ".$comentarios[$i]["comentario"]."</td>";
						print "<td><a class='btn btn-info' href='comentarios.php?m=C&id=".$comentarios[$i]["id"]."'>Publicar</a>
									<a class='btn btn-danger' href='comentarios.php?m=B&id=".$comentarios[$i]["id"]."'>Borrar</a>
							   </td>";
						print "</tr>";
					}
					print "</table>";
				}
				?>
			</div>
		</div>
		
	</div>
</div>



<?php include_once 'template/footer.php'; ?>