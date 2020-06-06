<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idempresaitem')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idempresaitem),array('view','id'=>$data->idempresaitem)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle2')); ?>:</b>
	<?php echo CHtml::encode($data->detalle2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle3')); ?>:</b>
	<?php echo CHtml::encode($data->detalle3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_idempresa')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_idempresa); ?>
	<br />


</div>