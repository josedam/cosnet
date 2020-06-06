<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Ingresar';
/*
$this->breadcrumbs=array(
	'Ingresar',
);*/
?>

<div class='row'>
<div class="span4 offset5">

<h3>Acceso Asociados</h3>

  <div class="form">
  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
	'focus'=>array($model,'username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
  )); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

  <?php /*
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div> 
  */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Ingresar',array('class'=>'btn')); ?>
	</div>

  <?php $this->endWidget(); ?>
  </div><!-- form -->
</div>
</div>
