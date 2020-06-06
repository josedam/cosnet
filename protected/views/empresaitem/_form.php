<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'empresaitem-form',
	'enableAjaxValidation'=>false,
//	'action' => Yii::app()->createUrl('empresaitem/create'),

)); ?>


	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'detalle',array('class'=>'span5','maxlength'=>256)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>

		<?php echo CHtml::link('Cancelar',
                    Yii::app()->controller->createUrl("detalle"),
                    array('class'=>'btn')
       	           )?>

	</div>

<?php $this->endWidget(); ?>
