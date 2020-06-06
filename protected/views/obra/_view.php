<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idobra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idobra),array('view','id'=>$data->idobra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('razon')); ?>:</b>
	<?php echo CHtml::encode($data->razon); ?>
	<br />
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('gerencia')); ?>:</b>
	<?php echo CHtml::encode($data->gerencia); ?>
	<br /> */ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cest')); ?>:</b>
	<?php echo CHtml::encode($data->cest); ?>
	<?php echo CHtml::encode($data->estado->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fest')); ?>:</b>
	<?php echo CHtml::encode($data->fest); ?>
	<br />
 
 <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('calle')); ?>:</b>
	<?php echo CHtml::encode($data->calle); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('barrio')); ?>:</b>
	<?php echo CHtml::encode($data->barrio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localidad')); ?>:</b>
	<?php echo CHtml::encode($data->localidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpos')); ?>:</b>
	<?php echo CHtml::encode($data->cpos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('normas')); ?>:</b>
	<?php echo CHtml::encode($data->normas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fnew')); ?>:</b>
	<?php echo CHtml::encode($data->fnew); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fmod')); ?>:</b>
	<?php echo CHtml::encode($data->fmod); ?>
	<br />

	*/ ?>

</div>
