

<div class='span5'>
<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'nombre',array('style'=>'width:100%;','maxlength'=>50)); ?>

    <?php echo $form->labelEx($model,'descripcion'); ?>
    <?php echo $form->textArea($model,'descripcion',array('style'=>'height:60px;width:100%;'));?>

    <?php echo $form->labelEx($model,'detalle'); ?>
    <?php echo $form->textArea($model,'detalle',array('style'=>'height:60px;width:100%;'));?>

    <?php echo $form->labelEx($model,'idrubro'); ?>
	<?php echo $form->dropDownList($model,'idrubro',Rubro::model()->allOptions); ?>

    <?php // echo $form->textFieldRow($model,'prcod',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'barras',array('class'=>'span5','maxlength'=>30)); ?>

	<?php //echo $form->textFieldRow($model,'preciocompra',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'precioventa',array('class'=>'span2')); ?>

	<?php // echo $form->textFieldRow($model,'cantidad',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'puntopedido',array('class'=>'span2')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->checkBoxRow($model,'publicado'); ?>

	<?php echo $form->checkBoxRow($model,'alaventa'); ?>

	<?php echo $form->checkBoxRow($model,'muestraprecio'); ?>

	<div class="form-actions">
	  <div class='pull-right'>
        <?php echo CHtml::link('Cancelar',$this->createUrl('admin'),array('class'=>'btn'));?>

		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
      </div>
	</div>

<?php $this->endWidget(); ?>
</div>
