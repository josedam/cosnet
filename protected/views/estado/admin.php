<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Estado'  , 'url'=>array('index')),
	array('label'=>'Create Estado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php $this->widget('application.extensions.formDialog.FormDialog', array('link'=>'a.create', 'options'=>array('onSuccess'=>'js:function(data, e){alert(data.message)}')))?>

<h1>Manage Estados</h1>

<div class='row'>
  <div class='pull-right'>
    <?php echo CHtml::link('Create', array('create'), array('class'=>'btn create')) ?>
  </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idestado',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
