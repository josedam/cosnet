
<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
	'focus'=>array($model,'username'),
)); ?>

	<?php // echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>128)); ?>

	<?php //echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php //echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>128)); ?>

	<?php //echo $form->textFieldRow($model,'rol',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>' Buscar ',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
