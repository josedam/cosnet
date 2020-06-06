<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'iddevolucion'); ?>
		<?php echo $form->textField($model,'iddevolucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcaptura'); ?>
		<?php echo $form->textField($model,'idcaptura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idregis'); ?>
		<?php echo $form->textField($model,'idregis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transac'); ?>
		<?php echo $form->textField($model,'transac'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cos'); ?>
		<?php echo $form->textField($model,'cos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ffac'); ?>
		<?php echo $form->textField($model,'ffac'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'npres'); ?>
		<?php echo $form->textField($model,'npres'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'csoc'); ?>
		<?php echo $form->textField($model,'csoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nlote'); ?>
		<?php echo $form->textField($model,'nlote'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nitem'); ?>
		<?php echo $form->textField($model,'nitem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'practicas'); ?>
		<?php echo $form->textField($model,'practicas',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fprac'); ?>
		<?php echo $form->textField($model,'fprac'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coper'); ?>
		<?php echo $form->textField($model,'coper',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factu'); ?>
		<?php echo $form->textField($model,'factu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hactu'); ?>
		<?php echo $form->textField($model,'hactu',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cmotivo'); ?>
		<?php echo $form->textField($model,'cmotivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paciente'); ?>
		<?php echo $form->textField($model,'paciente',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'obse'); ?>
		<?php echo $form->textArea($model,'obse',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->