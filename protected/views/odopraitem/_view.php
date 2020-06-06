<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idodopraitem')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idodopraitem),array('view','id'=>$data->idodopraitem)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nord')); ?>:</b>
	<?php echo CHtml::encode($data->nord); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cprac')); ?>:</b>
	<?php echo CHtml::encode($data->cprac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant')); ?>:</b>
	<?php echo CHtml::encode($data->cant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pieza')); ?>:</b>
	<?php echo CHtml::encode($data->pieza); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cara')); ?>:</b>
	<?php echo CHtml::encode($data->cara); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cest')); ?>:</b>
	<?php echo CHtml::encode($data->cest); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idodopra')); ?>:</b>
	<?php echo CHtml::encode($data->idodopra); ?>
	<br />

	*/ ?>

</div>