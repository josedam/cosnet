<?php
/* @var $this ActualizaController */

$this->breadcrumbs=array(
	array('Actualiza'=>'index'),
);

?>
<h1>Actualizacion de Liquidacion</h1>

<div class='row'>
<div class='span6'>
<?php foreach($model as $r): ?>
  <div class='row'>
    <div class='span2'><h3>Numero:<?php echo number_format($r->nroliq); ?></h3></div> 
    <div class='span4'><h3>Fecha :<?php echo $r->fliq; ?></h3></div> 
  </div>
<?php endforeach; ?>
</div>
</div>
<div class='row'>
<?php echo CHtml::link(' Comenzar ',array('doliquidacion'),array('class'=>'btn')); ?>
<?php echo CHtml::link(' Cancelar ',array('index'),array('class'=>'btn btn-danger')); ?>
</div>
