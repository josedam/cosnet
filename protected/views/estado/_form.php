<?php
/* @var $this EstadoController */
/* @var $model Estado */
/* @var $form CActiveForm */
?>


<div style='margin:10px;'>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idestado'); ?>
		<?php echo $form->textField($model,'idestado',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idestado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar',
		     array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
