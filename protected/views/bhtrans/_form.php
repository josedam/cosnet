<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'bhtrans-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nroliq',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'apyn',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'ctcta',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nctab',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'cbu1',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'cbu2',array('class'=>'span5','maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'tdoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ndoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'facre',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'imp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'csoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'simp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tarjeta',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fcupon',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ncupon',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'impcupon',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'plan',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'dctotarj',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dctocirc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'frmpgo',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
