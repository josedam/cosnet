<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'odopra-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'cos',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nafil',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'gpar',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ndoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nord',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'faut',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'csoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'coper',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fdia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cest',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
