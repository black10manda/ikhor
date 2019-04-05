
<?php $title = 'Terminos Legales'; ?>
<?php $currentPage = 'terminoLegales'; ?>
<?php include_once 'template/header.php';
require "php/conn.php";
require "php/session.php";
require "php/laterales.php";

 ?>
<?php 
require "php/carrito.php"; ?>
<?php include_once 'template/navbar.php'; ?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 hidden-xs col-md-2 sidenav">
			<h4>Productos más vendidos</h4>
			<?php masVendidos($conn); ?>

		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor">
				<h4> Políticas de ventas</h4>
<h5>
Pedidos</h5>
<p>
    El pedido que se haga después de medio día será enviado hasta el próximo día, si se hace antes del medio día la empresa se compromete a enviarlo por paquetería ese mismo día.
    Una vez que el pedido salga de nuestros almacenes, se le enviará un e-mail notificándole que su pedido ha sido aceptado y está siendo enviado.
    El pedido realizado por usted le será entregado en un plazo máximo de 5 días laborables desde que le hemos hecho la confirmación del pedido. Aunque el plazo de entrega habitual de LA EMPRESA suele oscilar entre los 1 y los 3 días, desde la finalización del pedido.
    El Cliente se compromete a pagar en el momento que realiza el pedido. Al precio inicial que figure en el sitio Web para cada uno de los productos ofrecidos se le sumarán las tarifas correspondientes a los gastos de envío pertinentes.
    LA EMPRESA aceptará cancelaciones de pedidos cuando se soliciten antes del envío del mismo. Para realizar la cancelación debes solicitarlo enviando un Mensaje a <a href="</a>">Facebook</a>
</p>
 

<h5>Precios</h5>

    <p>El precio se respetara de acuerdo a cuando el cliente hizo su pedido, si después de minutos el precio cambia no afectara al pedido que ya se realizó.
    Los precios de nuestros productos así como nuestra facturación son en pesos mexicanos sin embargo  en casos especiales los precios podrán estar en dólares, pero en todo caso estará indicado claramente.
    Los precios están sujetos a cambios.
    Los precios publicados no incluyen IVA que es lo que cobrara la paquetería por enviar el pedido.</p>

<h5>Devoluciones </h5>

    <p>No se aceptarán devoluciones de productos abiertos, dañados, maltratados, descontinuados, caducados y productos que se hayan solicitado para un pedido especial.
    Se otorgará garantía en los productos que comercializamos que presenten fallas de fabricación en un lapso no mayor a los treinta días después de haber recibido el producto, después de este período no hay garantías.
    No se aceptarán garantías que se deriven por el mal uso del usuario
    El envío debe hacerse usando la misma caja en que ha sido recibido para proteger el producto. Para el supuesto que no pueda hacerse con la caja con la que se entregó, el Cliente deberá devolverlo en una caja protectora con el fin de que el producto llegue al almacén de LA EMPRESA con las máximas garantías posibles.
    El producto debe estar en el mismo estado en que se entregó y deberá conservar su embalaje y etiquetado original.
    LA EMPRESA se compromete a entregar el producto en perfecto estado en la dirección que el Cliente señale en el formulario de pedido.
    Con el fin de optimizar la entrega, agradecemos al Cliente que indique una dirección en la cual el pedido pueda ser entregado dentro del horario laboral habitual.
    LA EMPRESA no será responsable por los errores causados en la entrega cuando la dirección de entrega introducida por el Cliente en el formulario de pedido no se ajuste a la realidad o hayan sido omitidos.
    Cada entrega se considera efectuada a partir del momento en el cual la empresa de transportes pone el producto a disposición del Cliente, que se materializa a través del sistema de control utilizado por la compañía de envíos.
    El Cliente deberá comprobar el buen estado del paquete ante el transportista que, por cuenta de LA EMPRESA, realice la entrega del producto solicitado, indicando en el albarán de entrega cualquier anomalía que pudiera detectar en el embalaje.</p>


				
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