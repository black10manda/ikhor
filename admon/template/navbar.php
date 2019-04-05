


<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target='#menu'>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="../index.php" class="navbar-brand">IKHOR</a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li class="<?php if ($currentPage == 'Productos') {echo 'active';} ?> " > <a href="productosCRUD.php" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>     Productos</a></li>
				<li class="<?php if ($currentPage == 'Usuarios') {echo 'active';} ?> "><a href="usuarios.php" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
				<li class="<?php if ($currentPage == 'Pedidos') {echo 'active';} ?> "><a href="pedidos.php" ><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Pedidos</a></li>
				<li class="<?php if ($currentPage == 'Contacto') {echo 'active';} ?> "><a href="contactoCUD.php" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contactos</a></li>
				<li class="<?php if ($currentPage == 'comentarios') {echo 'active';} ?> "><a href="comentarios.php" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Comentarios</a></li>
				<form action="busca.php" method="get" class="navbar-form navbar-left">
        			<div class="form-group">
         				<input type="text" name="buscar" class="form-control" placeholder="Buscar Producto">
        			</div>
        			<button type="submit" class="btn btn-default">Buscar</button>
      			</form>
			</ul>
			<ul class="nav navbar-nav navbar-right">	
				<?php
				//Validamos si hay sesión
				if(isset($_SESSION['admon'])){
					print '<li><a class="" href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp;Logout</a></li>';
				} else {
					header("location:index.php");
				}
				?>
			</ul>
		</div>
	</div>
</nav>
<br><br>