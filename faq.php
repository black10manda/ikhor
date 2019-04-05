
<?php $title = 'Preguntas Frecuentes'; ?>
<?php $currentPage = 'faq'; 
require "php/session.php";?>
<?php include_once 'template/header.php'; 
require "php/conn.php";
require "php/laterales.php";
?>
<?php require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
      <?php masVendidos($conn); ?>
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h1> FAQ <small>Preguntas Frecuentes</small></h1>
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          ¿Qué costo genera el envió?
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        El costo es totalmente gratis
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          ¿Dónde puedo visitar la tienda físicamente?
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
         M. Doblado 523, Zona Centro, Acámbaro, Guanajuato
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d937.0990873057763!2d-100.71714837082685!3d20.03383465911446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cd673e0927885%3A0x47ee87c583ab7fbd!2sM.+Doblado+523%2C+Zona+Centro%2C+38600+Ac%C3%A1mbaro%2C+Gto.!5e0!3m2!1ses-419!2smx!4v1553832329839!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          ¿Los artículos recibidos son incorrectos o tienen un defecto. ¿Qué hago?
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Si alguno de nuestros productos llega en mal estado o son incorrectos se le hace el cambio sin ningún problema.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingfour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
          ¿Con quién debo contactar en caso de que el producto me llegue mal?  
        </a>
      </h4>
    </div>
    <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
      <div class="panel-body">
        En este caso debes contactar directamente con nosotros ya que si el producto ha venido defectuoso, te lo cambiaremos por uno nuevo sin que tengas que pagar ningún gasto de envío.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingfive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
          ¿Cuánto tardará mi compra en llegar?     
        </a>
      </h4>
    </div>
    <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
      <div class="panel-body">
        Cada día salen todos los pedidos que entran antes de las 13h y se entregan a las 48 horas aproximadamente. En casos especiales, podría demorarse un día más aunque no es lo habitual.
      </div>
    </div>
  </div>
</div>
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
