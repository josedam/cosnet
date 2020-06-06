<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpedido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpedido),array('view','id'=>$data->idpedido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestadopedido')); ?>:</b>
	<?php echo CHtml::encode($data->idestadopedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeropedido')); ?>:</b>
	<?php echo CHtml::encode($data->numeropedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechahora')); ?>:</b>
	<?php echo CHtml::encode($data->fechahora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalbruto')); ?>:</b>
	<?php echo CHtml::encode($data->totalbruto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalneto')); ?>:</b>
	<?php echo CHtml::encode($data->totalneto); ?>
	<br />


</div>