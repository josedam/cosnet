<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idodopraitem',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nord',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cprac',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cant',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pieza',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'cara',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'cest',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idodopra',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
