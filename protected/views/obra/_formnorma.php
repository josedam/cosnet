<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'obra-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'normas'),
)); ?>

<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'idobra'); ?>

	<?php // echo $form->textAreaRow($model,'normas',array('rows'=>6, 'cols'=>70, 'class'=>'span9')); ?>

    <?php echo $form->textAreaRow($model,'normas',array('id'=>'editor1','rows'=>16, 'cols'=>30)); ?>

<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>



<?php /*
 <?php $this->widget('application.extensions.ckeditor.cKEditorWidget',array(
    'model'=>$model,                # Data-Model (form model)
    'attribute'=>'normas',         # Attribute in the Data-Model
    "config" => array(
        "height"=>"400px",
        "width"=>"100%",
        "toolbar"=>"Full",
        ),

    'ckEditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
                                    # Path to ckeditor.php
    'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
                                    # Relative Path to the Editor (from Web-Root)
) ); ?>

*/ ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
