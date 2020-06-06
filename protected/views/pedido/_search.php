<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idpedido',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'idestadopedido',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'iduser',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'numeropedido',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fechahora',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'totalbruto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'totalneto',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
