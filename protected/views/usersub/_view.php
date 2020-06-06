<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusersub')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idusersub),array('view','id'=>$data->idusersub)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />


</div>