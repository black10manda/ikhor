

<?php  
require "php/conn.php";

if (isset($_POST["nombre"])) {
 	$name=$_POST["nombre"];
 	$comentario=$_POST["comentario"];

 	$sql = "CALL sp_addComentario ( 0, '".$name."', '".$comentario."', 0)";

	print $sql;

	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: producto.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>




<div class="container-fluid text-center">
	<div class="row content">
		
		<div class="col-xs-12 col-md-12 text-left">
			<div class="well" id="contenedor">
				<?php
				if(count($errores)>0){
					print '<div class="alert alert-danger">';
					foreach ($errores as $key => $valor) {
						print "<strong>* ".$valor."</strong>";
					}
					print '</div>';
				} ?>




				<form action="comentarios.php" method="post">
					
						<?php if (isset($_SESSION['usuario'])) {?>

						<label>
							<?php 
							print $nombre; 
							echo " ";
							print $apellido;
							?>
						</label>
						<input type="hidden" name="nombre" value="<?php print $nombre ." ". $apellido;?>">
						<div class="form-group text-left">
							<label for="comentario">* Comentario:</label>
							<textarea class="form-control" name="comentario" id="comentario" required=""></textarea>
						</div>
						<div class="form-group text-left">
							<label for="enviar"></label>
							<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
						</div>	
				</form>
				<?php } else{ ?>
						<a href="loginE.php">Iniciar Seccion para comentar</a>
						<?php } ?>
			</div>
				<h3>Comentarios</h3>
			<div class="well" id="contenedor">
				<?php 
				$sql = "SELECT * FROM comentario";
				$r = mysqli_query($conn, $sql);
				$usuarios = array();
				while($data = mysqli_fetch_assoc($r)){
					array_push($usuarios, $data);
				}

					for ($i=0; $i < count($usuarios) ; $i++) { ?>
					<?php if ( $usuarios[$i]["publicado"]): 1 ?>
						<div class="text_comment comment_box">
			            <p class="date_comment">Publicado el <?php echo $usuarios[$i]["fechaCrea"] ?> </p>
			            <p class="user"><?php echo $usuarios[$i]["usuario"] ?> dijo:</p>
			            <p class="content_message"><?php echo $usuarios[$i]["comentario"] ?></p>
		         	</div>
					<?php endif ?>
					 
				<?php	} ?>

				 
			</div>


		</div>
		
		
	</div>
</div>

