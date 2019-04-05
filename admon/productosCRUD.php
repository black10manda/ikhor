<?php 
ini_set('error_reporting',0);
session_start();
if (!isset($_SESSION["admon"])) {
	header("location:index.php");
}

 ?>
<?php $title = 'CPanel'; ?>
<?php $currentPage = 'Productos'; ?>
<?php require "../php/conn.php";
	  require "../php/funciones.php";?>
<?php include_once 'template/header.php'; ?>

<?php
//Modo de la página  alta, bajas, modificacion
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
	//Recuperamos el nombre de la imagen
	$sql = "SELECT imagen FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql); 
	$row = mysqli_fetch_assoc($r); //guarda el select
	$imagen = $row["imagen"];
	unlink("../img/".$imagen);
	//Borramos el registro
	$sql = "CALL `sp_deleteProducto`(".$id.")";
	if(mysqli_query($conn, $sql)){
		header("location:productosCRUD.php");
	}
	$errores = array("Error al borrar el registro");
}

//Detectamos si se envía la información
if(isset($_POST["nombre"])){
	//Variables de trabajo
	//Recuperamos el id
	$errores = array();  // declara un array que se llama errores
	$id = (isset($_POST["id"]))?$_POST["id"]:"";
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	//Validacion de los numeros
	$precio = ($_POST["precio"]=="")?0:$_POST["precio"];
	$descuento = ($_POST["descuento"]=="")?0:$_POST["descuento"];
	$envio = ($_POST["envio"]=="")?0:$_POST["envio"];
	$imagen = $_POST["imagen"];
	$fecha = $_POST["fecha"];
	$relacion1 = $_POST["relacion1"];
	$relacion2 = $_POST["relacion2"];
	$relacion3 = $_POST["relacion3"];
	$masvendido = ($_POST["masvendido"]=="")?"0":"1";
	$nuevos = ($_POST["nuevos"]=="")?"0":"1";
	/*
	if(isset($_POST["masvendido"])){
		$masvendido = $_POST["masvendido"];		
	}if(isset($_POST["nuevos"])){
		$nuevos = $_POST["nuevos"];		
	}*/
	
	//Validaciones
	if ($nombre=="") {
		array_push($errores, "El nombre del producto es requerido");  //array push va empujando la posicion del array
	} else if ($descripcion=="") {
		array_push($errores, "La descripción es requerida");
	} else if (is_numeric($precio)==false) {
		array_push($errores, "Error en el precio, debe ser numérico");
	} else if (is_numeric($descuento)==false) {
		array_push($errores, "Error en el descuento debe ser numérico");
	} else if (is_numeric($envio)==false) {
		array_push($errores, "Error en el monto del envío, debe ser numérico");
	} else if ($precio<=0 || $precio>99999.99) {
		array_push($errores, "El precio está fuera de rango");
	} else if ($precio<$descuento) {
		array_push($errores, "El precio no puede ser menor al descuento");
	} else if ($fecha=="") {
		array_push($errores, "La fecha es requerida");
	} else if (validaFecha($fecha)==false) {
		array_push($errores, "Fecha errónea");
	} else {
		//Verificamos que el archivo haya sido enviado
		//Remplazamos caracteres especiales
		$buscar  = array(' ', '*', '!', '@', '?','á','é', 'í', 'ó','ú','Á','É','Í','Ó','Ú','Ñ','ñ','Ü','ü');
		$reemplazar = array('-', '', '', '', '', 'a','e', 'i', 'o','u','A','E','I','O','U','N','n','U','u');
		$imagen = str_replace($buscar, $reemplazar, $nombre); //que se remplace el nombrede la imagen
		$imagen = $imagen.".jpg";
		$imagen = strtolower($imagen);
		if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
			
			//Copiamos del area temporal a nuestra carpeta
			copy($_FILES['imagen']['tmp_name'], "../img/".$imagen);
			//Optimizar el archivo
			validaImagen($imagen, 240); //que no pese mas de 240k
		} else {
			array_push($errores, "Error en la carga de archivos");
		}
		//
		$desc_escapado = escapaCadena($descripcion);
		//
		if ($id=="") {   //si el id es nulo va insertar otro producto
			$sql = "CALL sp_addProducto(0,'0',";
			$sql .= "'".$nombre."', ";
			$sql .= "'".$descripcion."', ";
			$sql .= $precio.", ";
			$sql .= $descuento.", ";
			$sql .= $envio.", ";
			$sql .= "'".$imagen."', ";
			$sql .= "'".$fecha."', ";
			$sql .= "'".$relacion1."', ";
			$sql .= "'".$relacion2."', ";
			$sql .= "'".$relacion3."', ";
			$sql .= "'".$masvendido."', ";
			$sql .= "'".$nuevos."');";

		}else{
			$sql = "CALL sp_updateProducto(";
			$sql .="".$id.",";  //si tiene un id lo va actualizar
			$sql .= " '".$nombre."', ";
			$sql .= "'".$descripcion."', ";
			$sql .= "".$precio.", ";
			$sql .= "".$descuento.", ";
			$sql .= "".$envio.", ";
			$sql .= "'".$imagen."', ";
			$sql .= " '".$fecha."', ";
			$sql .= "'".$relacion1."', ";
			$sql .= " '".$relacion2."', ";
			$sql .= "'".$relacion3."', ";
			$sql .= "'".$masvendido."', ";
			$sql .= "'".$nuevos."') ";
			
		}
		//print $sql;
		if(mysqli_query($conn, $sql)){
			//print "El registro se insertó correctamente";
		} else {
			print "Error al insertar el registro";
		}
	}

}

//lee la tabla productos
if ($m=="S") {
	$sql = "SELECT * FROM productos";
	$r = mysqli_query($conn, $sql);
	$productos = array();
	while($row = mysqli_fetch_assoc($r)){  
		array_push($productos, $row);
	}
}
if ($m=="A" || $m=="C") {
	//Leyendo toda la tabla
	$sql = "SELECT id,nombre FROM productos ORDER BY nombre";
	$r = mysqli_query($conn, $sql);
	$productos = array();
	while($row = mysqli_fetch_assoc($r)){
		array_push($productos, $row);
	}
}

//lee un producto
if ($m=="C") {
	$id = $_GET["id"];
	$sql = "SELECT * FROM productos WHERE id=".$id;
	$r = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($r);
	//Variables de trabajo
	$nombre = $data["nombre"];
	$descripcion = $data["descripcion"];
	$precio = $data["precio"];
	$descuento = $data["descuento"];
	$envio = $data["envio"];
	$imagen = $data["imagen"];
	$fecha = $data["fecha"];
	$relacion1 =$data["relacion1"];
	$relacion2 = $data["relacion2"];
	$relacion3 = $data["relacion3"];
	$masvendido = $data["masvendido"];
	$nuevos = $data["nuevos"];
}
//lee la tabla productos

/*
$id=0;;
$masvendido = "";
$nuevos ="";
$nombre ="";
$descripcion ="";
$precio ="";
$descuento ="";
$envio="";
$fecha ="";
$relacion1 ="";
$relacion2 ="";
$relacion3 = "";
*/


?>

<?php include_once 'template/navbar.php'; ?>



<div class="container-fluid ">
	

	

	<div class="row content text-center">
		<div class="col-xs-1  col-md-1 sidenav" >
			
		</div>
		<div class="col-xs-10 col-sm-10 text-left">
			<div class="well" id="contenedor">
				<?php if($m=="S") { ?>
			<label for="alta"></label>
			<input type="button" name="alta" value="Dar de alta un producto" class="btn btn-info" role="button" id="alta" />
				<?php } ?>
				<div class="well" id="contenedor">
				<h2 class="text-center">Productos</h2>	
				<?php
				if($m=="A" || $m=="C"){
					if(count($errores)>0){
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor) {
							print "<strong>* ".$valor."</strong>";
						}
						print '</div>';
					}
				?>

				<form action="productosCRUD.php" method="post" enctype="multipart/form-data">
					<div class="form-group text-left">
						<label for="nombre">* Nombre:</label>
						<input required type="text" name="nombre" id="nombre" class="form-control"  placeholder="Escriba su nombre" value="<?php print $nombre; ?>"/>
					</div>

					<div class="form-group text-left">
						<label for="descripcion">* Descripción:</label>
						<textarea class="form-control" name="descripcion" id="descripcion"> <?php print $descripcion; ?> </textarea>
					</div> 

					<div class="form-group text-left">
						<label for="precio">* Precio:</label>
						<input type="text" name="precio" id="precio" required class="form-control" placeholder="Precio del producto" pattern="^(\d|-)?(\d|,)*\.?\d*$"/ value="<?php print $precio; ?>">
					</div>

					<div class="form-group text-left">
						<label for="descuento">* Descuento:</label>
						<input type="text" name="descuento" id="descuento" class="form-control" placeholder="Escriba el descuento del producto" pattern="^(\d|-)?(\d|,)*\.?\d*$"/ value="<?php print $descuento; ?>">
					</div>

					<div class="form-group text-left">
						<label for="envio">* Costo de envío:</label>
						<input type="text" name="envio" id="envio" class="form-control" placeholder="Costo de envío" pattern="^(\d|-)?(\d|,)*\.?\d*$"/ value="<?php print $envio; ?>">
					</div>

					<div class="form-group text-left">
						<label for="imagen">* Imagen:</label>
						<input type="file" name="imagen" id="imagen"  class="form-control" placeholder="Seleccione una imagen" accept="image/jpeg"/>
						<?php
							if(isset($imagen)){
								print "<img src='../img/".$imagen."' width='150'/>";
								print "<p>".$imagen."</p>";
							}
						?>
					</div>

					<div class="form-group text-left">
						<label for="fecha">* Fecha:</label>
						<input type="date" name="fecha" required id="fecha" class="form-control" placeholder="Escriba la fecha de creación" value="<?php print $fecha; ?>" />
					</div>

					<div class="form-group text-left">
						<label for="relacion1">* Producto relacionado 1:</label>
						<select id="relacion1" name="relacion1">
							<option value="0">-No hay productos relacionados-</option>
							<?php
								for ($i=0; $i < count($productos) ; $i++) { 
									print "<option value='".$productos[$i]["id"]."'";
									if ($productos[$i]["id"]==$relacion1) print " selected ";
									print "/>".$productos[$i]["nombre"]."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group text-left">
						<label for="relacion2">* Producto relacionado 2:</label>
						<select id="relacion1" name="relacion2">
							<option value="0">-No hay productos relacionados-</option>
							<?php
								for ($i=0; $i < count($productos) ; $i++) { 
									print "<option value='".$productos[$i]["id"]."'";
									if ($productos[$i]["id"]==$relacion2) print " selected ";
									print "/>".$productos[$i]["nombre"]."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group text-left">
						<label for="relacion3">* Producto relacionado 3:</label>
						<select id="relacion1" name="relacion3">
							<option value="0">-No hay productos relacionados-</option>
							<?php
								for ($i=0; $i < count($productos) ; $i++) { 
									print "<option value='".$productos[$i]["id"]."'";
									if ($productos[$i]["id"]==$relacion3) print " selected ";
									print "/>".$productos[$i]["nombre"]."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
					  <label><input type="checkbox" name="masvendido" id="masvendido"
						<?php if ($masvendido=="1") print " checked "; ?> 
					  	>Producto más vendido:</label>
					</div>

					<div class="form-group">
					  <label><input type="checkbox" name="nuevos" id="nuevos"
					  	<?php if ($nuevos=="1") print " checked "; ?> 
					  	>Producto nuevo:</label>
					</div>
						<input type="hidden" name="id" id="id" value="<?php print $id; ?>">					
					<div class="form-group text-left">
						<label for="enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>

						<label for="regresar"></label>
						<input type="button" name="regresar" value="Regresar" class="btn btn-info" role="button" id="regresar" />

						<?php if($m=="C"){ ?>
						<label for="borrar"></label>
						<input type="button" name="borrar" value="Borrar" class="btn btn-danger" role="button" id="borrar" />
						<?php } ?>
					</div>

				</form>
				<?php }
				if ($m=="S") {
					$ren = 0;
					for ($i=0; $i < count($productos) ; $i++) { 
						if ($ren==0) {
							print '<div class="row">';
						}
						print '<div class="col-sm-3 " style="height: 390px;" >';
						print '<img src="../img/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%; height: 80%;" alt="'.$productos[$i]["nombre"].'">';
						print '<p><a href="productosCRUD.php?m=C&id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></p>';
						print '</div>';
						$ren++;
						if ($ren==4) {
							$ren = 0;
							print "</div>";
						}
					}
				}
				?>

				
			</div>
		</div>
		
	</div>
	<div class="col-xs-2  col-md-1 sidenav" >
			
		</div>
</div>

<script>
		window.onload = function() {
			<?php if($m=="C") { ?>
			document.getElementById("borrar").onclick = function() {
				if (confirm("¿Desea borrar el producto?\nUna vez borrado el registro NO podrá ser recuperado.")) {
					var id = <?php print $id; ?>;
					window.open("productosCRUD.php?m=B&id="+id,"_self");
				}
			}
			<?php } ?>

			<?php if($m=="S") { ?>
				document.getElementById("alta").onclick = function() {
				window.open("productosCRUD.php?m=A","_self");
			}
			<?php } else { ?>
				document.getElementById("regresar").onclick = function() {
					window.open("productosCRUD.php","_self");
				}
			<?php } ?>
		}
	</script>

<?php include_once 'template/footer.php'; ?>