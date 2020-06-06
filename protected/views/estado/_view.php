<?php
/* @var $this EstadoController */
/* @var $data Estado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idestado), array('view', 'id'=>$data->idestado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>