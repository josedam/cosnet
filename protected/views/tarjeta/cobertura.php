
<h4 class="cos">INFORME DE TARJETAS DE CREDITO   </h4>
<p>El Departamento Contable recomienda considerar los porcentajes de "recargo" a los cupones de venta con tarjetas de cr&eacute;dito que figuran en el siguiente detalle :</p>
<div class="alert alert-info">
    <p>
    <b>IMPORTANTE:
    Recordamos que el COS debitar&aacute; el 5% del total del presupuesto emitido por usted, en concepto de Gastos Administrativos</b>
    </p>
</div>
<br>
<?php
  foreach ($model as $tarjeta) {
     $this->renderpartial('_unaTarjeta',array('tarjeta'=>$tarjeta));
   } 
?>

<?php $this->renderpartial('_numeroComercio',array('model'=>$model))?>

