<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idpedidodetalle',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idpedido',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idproducto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'cantidad',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'preciounitario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'preciototal',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
