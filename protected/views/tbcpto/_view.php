<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('row_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->row_id),array('view','id'=>$data->row_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpto')); ?>:</b>
	<?php echo CHtml::encode($data->cpto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deno')); ?>:</b>
	<?php echo CHtml::encode($data->deno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crub')); ?>:</b>
	<?php echo CHtml::encode($data->crub); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obse')); ?>:</b>
	<?php echo CHtml::encode($data->obse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acm_dgi')); ?>:</b>
	<?php echo CHtml::encode($data->acm_dgi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gen_ddor')); ?>:</b>
	<?php echo CHtml::encode($data->gen_ddor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bcond')); ?>:</b>
	<?php echo CHtml::encode($data->bcond); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acm')); ?>:</b>
	<?php echo CHtml::encode($data->acm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lecop')); ?>:</b>
	<?php echo CHtml::encode($data->lecop); ?>
	<br />

	*/ ?>

</div>