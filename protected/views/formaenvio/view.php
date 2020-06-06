<?php
/* @var $this FormaenvioController */
/* @var $model Formaenvio */

$this->breadcrumbs=array(
	'Formaenvios'=>array('index'),
	$model->idformaenvio,
);

$this->menu=array(
	array('label'=>'List Formaenvio', 'url'=>array('index')),
	array('label'=>'Create Formaenvio', 'url'=>array('create')),
	array('label'=>'Update Formaenvio', 'url'=>array('update', 'id'=>$model->idformaenvio)),
	array('label'=>'Delete Formaenvio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idformaenvio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Formaenvio', 'url'=>array('admin')),
);
?>

<h1>View Formaenvio #<?php echo $model->idformaenvio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idformaenvio',
		'nombre',
	),
)); ?>
