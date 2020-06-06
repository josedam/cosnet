<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'obra-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,$model->isNewRecord?'idobra':'nombre'),
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
	
<table class="detail-view table table-striped table-condensed" id="yw0">
<tr class="odd">
	<td><?php echo $form->labelEx($model,'idobra'); ?></td>
	<td>
	<?php if($model->isNewRecord):?>
      <?php echo $form->textField($model,'idobra',array('class'=>'span1','maxlength'=>10)); ?>
    <?php else:?>
	  <?php echo $form->hiddenField($model,'idobra'); ?>
	  <?php echo $model->idobra ?>
	<?php endif;?>
	</td>
</tr>
<tr class="even">
	<td><?php echo $form->labelEx($model,'nombre'); ?></td>
	<td><?php echo $form->textField($model,'nombre',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="odd">
	<td><?php echo $form->labelEx($model,'razon'); ?></td>
	<td><?php echo $form->textField($model,'razon',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="even">
	<td><?php echo $form->labelEx($model,'gerencia'); ?></td>
	<td><?php echo $form->textField($model,'gerencia',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="odd">
	<td><?php echo $form->labelEx($model,'cest'); ?></td>
	<td><?php echo $form->dropDownList($model,'cest',
	       CHtml::listData(Estado::model()->allData(),'idestado','nombre'),
	       array('class'=>'span2','maxlength'=>10)
	);?></td>
	
</tr>
<tr class="even">
	<td><?php echo $form->labelEx($model,'fest'); ?></td>
	<td>
    <?php $this->widget('CMaskedTextField',array(
        'mask'=>'99/99/9999',
        'model'=>$model,
        'attribute'=>'fest',
        'name'=>'fest',
        'htmlOptions' => array('style' => 'width: 80px;')
    )); ?>
    </td>  	
</tr>
<tr class="odd">
	<td><?php echo $form->labelEx($model,'calle'); ?></td>
	<td><?php echo $form->textField($model,'calle',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="even">
	<td><?php echo $form->labelEx($model,'barrio'); ?></td>
	<td><?php echo $form->textField($model,'barrio',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="odd">
	<td><?php echo $form->labelEx($model,'localidad'); ?></td>
	<td><?php echo $form->textField($model,'localidad',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="even">
	<td><?php echo $form->labelEx($model,'provincia'); ?></td>
	<td><?php echo $form->textField($model,'provincia',array('class'=>'span3','maxlength'=>64)); ?></td>
</tr>
<tr class="odd">
	<td><?php echo $form->labelEx($model,'cpos'); ?></td>
	<td><?php echo $form->textField($model,'cpos',array('class'=>'span2','maxlength'=>10)); ?></td>
</tr>
<tr class="even">
	<td><?php echo $form->labelEx($model,'email'); ?></td>
	<td><?php echo $form->textField($model,'email',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr class="odd">
    <td><?php echo $form->labelEx($model,'tcoseg'); ?></td>
    <td><?php echo $form->textField($model,'tcoseg',array('class'=>'span1','maxlength'=>2)); ?></td>
</tr>


<?php /*
	<?php echo $form->textAreaRow($model,'normas',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'fnew',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fmod',array('class'=>'span5')); ?>
*/ ?>
</table>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
