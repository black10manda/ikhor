<?php require 'login.php'; ?>


<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target='#menu'>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand navbar-brand">IKHOR
			</a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li <?php if ($currentPage == 'index') {echo 'class="active"';} ?> ><a href="index.php">Inicio</a></li>
				<!--li <?php if ($currentPage == 'tienda') {echo 'class="active"';} ?>><a href="tienda.php">Tienda</a></li-->
				<li <?php if ($currentPage == 'nosotros') {echo 'class="active"';} ?>><a href="nosotros.php">Nosotros</a></li>
				<li <?php if ($currentPage == 'contacto') {echo 'class="active"';} ?>><a href="contacto.php">Contacto</a></li>
				<!--li <?php if ($currentPage == 'comentarios') {echo 'class="active"';} ?>><a href="comentarios.php">Comentarios</a></li-->
				<li <?php if ($currentPage == 'terminoLegales') {echo 'class="active"';} ?>><a href="terminoLegales.php">Terminos Legales</a></li>
				<li <?php if ($currentPage == 'faq') {echo 'class="active"';} ?>><a href="faq.php">FAQ.</a></li>
		
				<form action="busca.php" method="get" class="navbar-form navbar-left">
        			<div class="form-group">
         				<input type="text" name="buscar" class="form-control" placeholder="Buscar Producto">
        			</div>
        			<button type="submit" class="btn btn-default">Buscar</button>
      			</form>
			</ul>
			<ul class="nav navbar-nav navbar-right">	
				<?php require "php/navbar.php" ?>
			</ul>
		</div>
	</div>
</nav>

<br><br>