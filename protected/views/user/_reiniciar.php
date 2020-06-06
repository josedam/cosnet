

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<h3><?php echo $model->nombre.' ('.$model->username.')'; ?></h3>


<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl('/user/doreiniciarclave'),
	'method'=>'post',
)); ?>

	<?php echo $form->hiddenField($model,'id'); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>' Aceptar ',
		)); ?>
		<?php echo CHtml::link(' Cancelar ',array('/user/reiniciarclave'),array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>