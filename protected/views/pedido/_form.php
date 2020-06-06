<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'pedido-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idestadopedido',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'iduser',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'numeropedido',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fechahora',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'totalbruto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'totalneto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fechapedido',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'idformaenvio',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idformapago',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
