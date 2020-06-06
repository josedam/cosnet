<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<?php echo $form->textFieldRow($model,'cpto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deno',array('class'=>'span5','maxlength'=>30)); ?>

<?php /*
	<?php echo $form->textFieldRow($model,'crub',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'obse',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'acm_dgi',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'gen_ddor',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'bcond',array('class'=>'span5','maxlength'=>120)); ?>

	<?php echo $form->textFieldRow($model,'acm',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'lecop',array('class'=>'span5')); ?>
*/?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
