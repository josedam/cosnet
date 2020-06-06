<?php
/* @var $this FormaenvioController */
/* @var $data Formaenvio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idformaenvio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idformaenvio), array('view', 'id'=>$data->idformaenvio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>