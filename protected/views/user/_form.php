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

<?php if($model->isNewRecord): ?>
  <tr>
	<th><?php echo $form->labelEx($model,'password'); ?></th>
	<td><?php echo $form->passwordField($model,'password',array('class'=>'span5','maxlength'=>128,'style'=>'width: 80px;')); ?></td>
  </tr>
  <tr>
    <th><?php echo $form->labelEx($model,'repeatpassword'); ?></th>
    <td><?php echo $form->passwordField($model,'repeatpassword',array('class'=>'span5','maxlength'=>128,'style'=>'width: 80px;')); ?></td>
  </tr>
<?php endif;?>
<tr>
	<th><?php echo $form->labelEx($model,'email'); ?></th>
	<td><?php echo $form->textField($model,'email',array('class'=>'span5','maxlength'=>128)); ?></td>
</tr>
<?php if(Yii::app()->user->esRoot): ?>
  <tr>
    <th><?php echo $form->labelEx($model,'rol'); ?></th>
    <td><?php
      echo $form->dropDownList($model,'rol', User::listaRoles() ,array('style'=>'width: 140px;'));
    ?></td>
  </tr>
<?php endif;?>

<?php /*
<tr>
    <th><?php echo $form->labelEx($model,'esadmin'); ?></th>
    <td><?php echo $form->checkBox($model,'esadmin'); ?></td>
</tr> */ ?>
</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>

		<?php echo CHtml::link('Cancelar',$url,array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>
