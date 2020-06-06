<?php
/* @var $this FormapagoController */
/* @var $model Formapago */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	$model->idformapago,
);

$this->menu=array(
	array('label'=>'List Formapago', 'url'=>array('index')),
	array('label'=>'Create Formapago', 'url'=>array('create')),
	array('label'=>'Update Formapago', 'url'=>array('update', 'id'=>$model->idformapago)),
	array('label'=>'Delete Formapago', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idformapago),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Formapago', 'url'=>array('admin')),
);
?>

<h1>View Formapago #<?php echo $model->idformapago; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idformapago',
		'nombre',
	),
)); ?>
