<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl('/facrcp/docreate'),
	'method'=>'post',	
	'id'=>'facrcp-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'observaciones'),
)); ?>

	<?php /* echo $form->errorSummary($model); */?>

	<?php echo $form->hiddenField($model,'periodo')?> 

	<?php echo $form->hiddenField($model,'csoc'); ?>

	<?php /*echo $form->dropDownList($model,'csoc', User::htmlOptions() ,array('class'=>'span5')); */?>


	<?php /*echo $form->textFieldRow($model,'cantidad',array('class'=>'span5','maxlength'=>11)); */?>

	<?php echo $form->textAreaRow($model,'observaciones',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<div class="form-actions">
		<div style='float:left;'>
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Confirmar' : 'Guardar',
		)); ?>
		</div>
		<div style='float:left; margin-left:15px;'>
			<?php echo CHtml::link('Cancelar',Yii::app()->createUrl('facrcp/create'),array('class'=>'btn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
