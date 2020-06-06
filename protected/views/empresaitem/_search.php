<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idempresaitem',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'detalle',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'detalle2',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'detalle3',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'empresa_idempresa',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
