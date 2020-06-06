<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devolucion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idcaptura'); ?>
		<?php echo $form->textField($model,'idcaptura'); ?>
		<?php echo $form->error($model,'idcaptura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idregis'); ?>
		<?php echo $form->textField($model,'idregis'); ?>
		<?php echo $form->error($model,'idregis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transac'); ?>
		<?php echo $form->textField($model,'transac'); ?>
		<?php echo $form->error($model,'transac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cos'); ?>
		<?php echo $form->textField($model,'cos'); ?>
		<?php echo $form->error($model,'cos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ffac'); ?>
		<?php echo $form->textField($model,'ffac'); ?>
		<?php echo $form->error($model,'ffac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'npres'); ?>
		<?php echo $form->textField($model,'npres'); ?>
		<?php echo $form->error($model,'npres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csoc'); ?>
		<?php echo $form->textField($model,'csoc'); ?>
		<?php echo $form->error($model,'csoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nlote'); ?>
		<?php echo $form->textField($model,'nlote'); ?>
		<?php echo $form->error($model,'nlote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nitem'); ?>
		<?php echo $form->textField($model,'nitem'); ?>
		<?php echo $form->error($model,'nitem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'practicas'); ?>
		<?php echo $form->textField($model,'practicas',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'practicas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fprac'); ?>
		<?php echo $form->textField($model,'fprac'); ?>
		<?php echo $form->error($model,'fprac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coper'); ?>
		<?php echo $form->textField($model,'coper',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'coper'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factu'); ?>
		<?php echo $form->textField($model,'factu'); ?>
		<?php echo $form->error($model,'factu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hactu'); ?>
		<?php echo $form->textField($model,'hactu',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'hactu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cmotivo'); ?>
		<?php echo $form->textField($model,'cmotivo'); ?>
		<?php echo $form->error($model,'cmotivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paciente'); ?>
		<?php echo $form->textField($model,'paciente',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'paciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obse'); ?>
		<?php echo $form->textArea($model,'obse',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'obse'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->