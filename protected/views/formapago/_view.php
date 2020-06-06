<?php
/* @var $this FormapagoController */
/* @var $data Formapago */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idformapago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idformapago), array('view', 'id'=>$data->idformapago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>