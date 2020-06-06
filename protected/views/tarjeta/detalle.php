<?php
  $cs = Yii::app()->getClientScript();
  $cs->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
?>

<h3>Detalle Cobro de Tarjetas <?php echo $reci->fliq ?></h3>

<div class='container'> <!-- Detalle -->
  <div class='row'>
  <div class='span10' style='border:1px solid;font-weight:bold;'>
    <div class='span3'>Paciente</div>
    <div class='span2'>Fecha</div>
    <div class='span1'>Importes</div>
    <div class='span2'>Observaciones</div>
  </div>
  </div>

  <?php foreach($data as $r):?>

  <div class='row' >
  <div class='span9'>

    <div class='span3'><?php echo $r->nombre; ?></div>
    <div class='span2'><?php echo $r->fcupon; ?></div>
    <div class='span1 derecha'><?php echo $r->impcupon==0?'&nbsp;':number_format($r->impcupon,2); ?></div>
    <div class='span2'><?php echo $r->tarjeta.' ('.$r->plan.')' ?></div>
  </div>
  </div>

  <?php endforeach; ?>
</div> <!-- Fin Detalle -->

<?php if(!$data): ?>
   <?php $this->renderPartial('error',array('mensaje'=>'No se registran datos para el Detalle de Liquidacion')); ?>
<?php else: ?>

  <div class='container'> <!-- Resumen Liq -->
    <h4>Totales</h4>

    <div class='row'>
      <div class='span2 offset1'>Importe Bruto</div>
      <div class='span1 derecha'><?php echo number_format($totales['bruto'],2); ?></div>
    </div>

    <div class='row'>
      <div class='span2 offset1'>Retencion de Tarjetas</div>
      <div class='span1 derecha'><?php echo number_format($totales['tarjeta'],2); ?></div>
    </div>

    <div class='row'>
      <div class='span2 offset1'>Derecho Circulo</div>
      <div class='span1 derecha'><?php echo number_format($totales['circulo'],2); ?></div>
    </div>

    <div class='row'>
    <h3>
      <div class='span3'>Neto a Percibir</div>
      <div class='span1 offset1 derecha'><?php echo number_format($totales['neto'],2); ?></div>
    </h3>
    </div>


  </div> <!-- Fin Resumen -->

<?php endif; ?>

