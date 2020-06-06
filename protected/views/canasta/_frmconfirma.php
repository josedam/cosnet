
<?php $this->renderPartial('_mailpedido',array('pa'=>$model,'destino'=>'pagina')); ?>

<br>
<?php $this->renderPartial('_infoadicional',array('model'=>$model)); ?>

<?php /*
<h3>Informacion Adicional</h3>
<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'pedido-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldRow($model,'idestadopedido',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'iduser',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'numeropedido',array('class'=>'span5','maxlength'=>30)); ?>

	<?php //echo $form->textFieldRow($model,'fechahora',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'totalbruto',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'totalneto',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fechapedido',array('class'=>'span5')); ?>
<div class='row'>
  <div class='span6>
  <div class='span3>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>50)); ?>
  </div>
  <div class='span3'>
    <?php echo $form->labelEx($model,'idformaenvio'); ?>
    <?php echo $form->dropDownList($model, 'idformaenvio', Formaenvio::model()->options);?>

	<?php //echo $form->textFieldRow($model,'idformaenvio',array('class'=>'span5','maxlength'=>10)); ?>

    <?php echo $form->labelEx($model,'idformapago'); ?>
    <?php echo $form->dropDownList($model, 'idformapago',Formapago::model()->options); ?>
    
	<?php //echo $form->textFieldRow($model,'idformapago',array('class'=>'span5','maxlength'=>10)); ?>
  </div>
  </div>
</div>
	<div class="form-actions">
	    <?php echo CHtml::link('<i class="icon-chevron-left"></i> Regresar',
	                array('pedido'),
	                array(
	                  'class'=>'btn',
	                  'title'=>'Continuar Agregando Productos'
	                )
	              );?>
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Confirmar',
			'icon'=>'ok white',
		)); ?>
	</div>
	
<?php $this->endWidget(); ?>

*/ ?>
