<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idproducto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idrubro',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'prcod',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'barras',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'preciocompra',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'precioventa',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cantidad',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'puntopedido',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'activo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'publicado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'alaventa',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'muestraprecio',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
