<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'facperiodo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'periodo',array('class'=>'span2','maxlength'=>6)); ?>

	<?php /*echo $form->textFieldRow($model,'activo',array('class'=>'span2'));*/ ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
