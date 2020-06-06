<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
	'id'=>'facrcp-form',
	'enableAjaxValidation'=>false,
	//'focus'=>array($model,'csoc'),
)); ?>

	<?php /* echo $form->errorSummary($model); */?>


 <?php
  echo $form->hiddenField($model,'csoc',array()); // Campo oculto para guardar el ID de la persona seleccionada
  $this->widget('zii.widgets.jui.CJuiAutoComplete',
   array(
    'name'=>'apellidos_nombres', // Nombre para el campo de autocompletar
    'model'=>$model,
  //  'value'=>$model->isNewRecord ? '' : $model->persona->apellidos.' '.$model->persona->nombres,
    'source'=>$this->createUrl('facrcp/autocomplete'), // URL que genera el conjunto de datos
    'options'=> array(
      'showAnim'=>'fold',
      'size'=>'30',
      'minLength'=>'2', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
      'select'=>"js:function(event, ui) { 
       $('#Facrcp_csoc').val(ui.item.id); // HTML-Id del campo
       }"
      ),
    'htmlOptions'=> array(
     //'size'=>60,
     'class'=>'span5',
     'placeholder'=>'Profesional ...',
     'title'=>'Indique Matricula o Apellido y Nombre '
     ),
   ));  
 ?>

	<?php /*echo $form->dropDownList($model,'csoc', User::htmlOptions2() ,array('class'=>'span5')); */?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Confirmar' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<script>
jQuery('#apellidos_nombres').focus();
</script>

