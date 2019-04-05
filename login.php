


<!-- Modal -->
<div id="login" class="modal fade" role="dialog">	<!-- Esta line crea la animacion -->
<div class="modal-dialog">	<!-- Para ocultar hasta que se de clip o se elija -->
<!-- Modal contenido -->
<div class="modal-content">
	<div>
		<button type="button" class="close" data-dismiss="modal"> &times; </button>	<!-- Data-dismiss es para serrar todo el modal -->
		<h4 class="modal-title text-center"> Login </h4>
	</div>
	<div class="modal-body ">
		

		<div id="Contenedor" >
			<?php 
	if (isset($errores)) {
		print('<div class="alert alert-danger">');
		print "<strong>".$error."</strong>";
		print('</div>');
	}
	

	 ?>
		 <div class="Icon"><span class="glyphicon glyphicon-user"></span></div>
		
		 <div class="ContentForm">
		 	<form action="loginE.php" method="post" name="FormEntrar">
		 		<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
				  <input type="email" class="form-control" name="email" placeholder="email" aria-describedby="sizing-addon1" required >
				</div>
				<br>
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				  <input type="password" name="clave" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required >
				</div>
				<div class="checkbox">
					<label style="color: white;" id="recordarme" name="recordarme"><input type="checkbox" >Recordarme</label>
				</div>
				<br>
				<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
				<div class="opcioncontra"><a href="olvido.php" style="color: white;">Olvidaste tu contraseña?</a></div>
				<div class="opcioncontra"><a href="registro.php" class="btn btn-info">Registrate</a></div>
		 	</form>
		 </div>
			
		 </div>

</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar </button>
	</div>
</div>
</div>
</div>