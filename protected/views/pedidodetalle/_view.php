<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpedidodetalle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpedidodetalle),array('view','id'=>$data->idpedidodetalle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpedido')); ?>:</b>
	<?php echo CHtml::encode($data->idpedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproducto')); ?>:</b>
	<?php echo CHtml::encode($data->idproducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preciounitario')); ?>:</b>
	<?php echo CHtml::encode($data->preciounitario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preciototal')); ?>:</b>
	<?php echo CHtml::encode($data->preciototal); ?>
	<br />


</div>