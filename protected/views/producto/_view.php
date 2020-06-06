<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproducto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idproducto),array('view','id'=>$data->idproducto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrubro')); ?>:</b>
	<?php echo CHtml::encode($data->idrubro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prcod')); ?>:</b>
	<?php echo CHtml::encode($data->prcod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('barras')); ?>:</b>
	<?php echo CHtml::encode($data->barras); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preciocompra')); ?>:</b>
	<?php echo CHtml::encode($data->preciocompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioventa')); ?>:</b>
	<?php echo CHtml::encode($data->precioventa); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puntopedido')); ?>:</b>
	<?php echo CHtml::encode($data->puntopedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publicado')); ?>:</b>
	<?php echo CHtml::encode($data->publicado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alaventa')); ?>:</b>
	<?php echo CHtml::encode($data->alaventa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('muestraprecio')); ?>:</b>
	<?php echo CHtml::encode($data->muestraprecio); ?>
	<br />

	*/ ?>

</div>