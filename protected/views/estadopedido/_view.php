<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestadopedido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idestadopedido),array('view','id'=>$data->idestadopedido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>