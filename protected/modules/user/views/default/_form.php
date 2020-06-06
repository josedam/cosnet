<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,$model->isNewRecord?'username':'nombre'),
)); ?>

	<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
<table class="detail-view table table-striped table-condensed" id="yw0">
<tr>
	<th><?php echo $form->labelEx($model,'username'); ?></th>
<?php if ($model->isNewRecord):?>
    <td><?php echo $form->textField($model,'username',array('class'=>'span5','maxlength'=>128,'style'=>'width: 80px;')); ?></td>
<?php else: ?>	
    <td><b><?php echo $model->username ?></b></td>
<?php endif; ?>	
</tr>
<tr>
	<th><?php echo $form->labelEx($model,'nombre'); ?></th>
    <td><?php echo $form->textField($model,'nombre',array('class'=>'span5','maxlength'=>40,)); ?></td>
</tr>
<tr>
	<th><?php echo $form->labelEx($model,'password'); ?></th>
	<td><?php echo $form->passwordField($model,'password',array('class'=>'span5','maxlength'=>128,'style'=>'width: 80px;')); ?></td>
</tr>
<tr>
	<th><?php echo $form->labelEx($model,'email'); ?></th>
	<td><?php echo $form->textField($model,'email',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<tr>
    <th><?php echo $form->labelEx($model,'idprovincia'); ?></th>
    <td><?php echo $form->dropDownList($model, 'idprovincia', 
                    CHtml::listData(Provincia::model()->findAll(array('order'=>'nombre')), 'idprovincia', 'nombre'),
                    array('prompt' => '-- Provincia --')
                  ); ?></td>
</tr>
<tr>
    <th><?php echo $form->labelEx($model,'esadmin'); ?></th>
    <td><?php echo $form->checkBox($model,'esadmin'); ?></td>
</tr>
</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
