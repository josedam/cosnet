<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idobra',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'razon',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'gerencia',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'cest',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fest',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'calle',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'barrio',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'localidad',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'provincia',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'cpos',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textAreaRow($model,'normas',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'fnew',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fmod',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
