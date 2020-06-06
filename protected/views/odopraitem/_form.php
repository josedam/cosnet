<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'odopraitem-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nord',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cprac',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cant',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pieza',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'cara',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'cest',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idodopra',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
