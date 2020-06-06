<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'idodopra',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cos',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nafil',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'gpar',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ndoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nord',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'faut',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'csoc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'coper',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fdia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cest',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
