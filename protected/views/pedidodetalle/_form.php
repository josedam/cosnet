<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'pedidodetalle-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idpedido',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idproducto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'cantidad',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'preciounitario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'preciototal',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
