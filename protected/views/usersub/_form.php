<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'usersub-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,$model->isNewRecord?'username':'nombre')
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->labelEx($model,'username'); ?>
	<?php if($model->isNewRecord): ?>
      <?php echo $form->textField($model,'username',array('class'=>'span5','maxlength'=>128)); ?>
    <?php else: ?>
      <b><?php echo $model->username ?></b>
    <?php endif; ?>

 
    <?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>128)); ?>


    <?php echo $form->labelEx($model,'passw'); ?>
    <?php echo $form->passwordField($model,'passw'); ?>

	<div class="form-actions">
        <?php echo CHtml::link('Cancelar',array('admin'),array('class'=>'btn'));?>

		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		
	</div>

<?php $this->endWidget(); ?>
