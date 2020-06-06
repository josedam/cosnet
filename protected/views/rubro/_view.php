<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrubro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrubro),array('view','id'=>$data->idrubro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>