<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'tbcpto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php if ($model->isNewRecord): ?>
		<?php echo $form->textFieldRow($model,'cpto',array('class'=>'span5')); ?>
	<?php endif; ?>

	<?php echo $form->textFieldRow($model,'crub',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deno',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
