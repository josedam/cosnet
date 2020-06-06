<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'empresa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'comercio',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefonos',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span5','maxlength'=>256)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>

		<?php echo CHtml::link('Cancelar',
                    Yii::app()->controller->createUrl("admin"),
                    array('class'=>'btn')
       	           )?>
	</div>

<?php $this->endWidget(); ?>
