<?php
  $cs = Yii::app()->getClientScript();
  $cs->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
?>
<div class='row'>
<h3>Detalle liquidacion <?php echo $reci->nroliq; ?> <?php echo $reci->fliq ?></h3>
<br>

  <div class='row'>
    <div class='span4'>Paciente</div>
    <div class='span1'>Tarjeta</div>
    <div class='span1'>Fecha</div>
    <div class='span1'>Cupon</div>
    <div class='span1'>Plan</div>
    <div class='span2'>Importe</div>
    <div class='span2'>Retencion Tarjeta</div>
    <div class='span2'>Derecho Circulo</div>
    <div class='span2'>Importe Neto</div>
  </div>

<?php foreach($data as $r):?>

  <div class='row'>
    <div class='span2'><?php echo $r->nombre; ?></div>
    <div class='span1'><?php echo $r->tarjeta; ?></div>
    <div class='span1'><?php echo $r->fcupon; ?></div>
    <div class='span1'><?php echo $r->ncupon; ?></div>   
    <div class='span1'><?php echo $r->plan; ?></div>
    
    <div class='span1'><?php echo $r->impcupon==0?'&nbsp;':number_format($r->impcupon,2); ?></div>
    <div class='span1'><?php echo $r->dcto_tarj==0?'&nbsp;':number_format($r->dcto_tarj,2); ?></div>
    <div class='span1'><?php echo $r->dcto_circ==0?'&nbsp;':number_format($r->dcto_circ,2); ?></div>
    <div class='span1'><?php echo $r->imp==0?'&nbsp;':number_format($r->imp,2); ?></div>
  </div>

<?php endforeach; ?>


</div>
