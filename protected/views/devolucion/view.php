<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */

$this->breadcrumbs=array(
	'Devolucions'=>array('index'),
	$model->iddevolucion,
);

$this->menu=array(
	array('label'=>'List Devolucion', 'url'=>array('index')),
	array('label'=>'Create Devolucion', 'url'=>array('create')),
	array('label'=>'Update Devolucion', 'url'=>array('update', 'id'=>$model->iddevolucion)),
	array('label'=>'Delete Devolucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iddevolucion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Devolucion', 'url'=>array('admin')),
);
?>

<h1>View Devolucion #<?php echo $model->iddevolucion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iddevolucion',
		'idcaptura',
		'idregis',
		'transac',
		'cos',
		'ffac',
		'npres',
		'csoc',
		'tipo',
		'nlote',
		'nitem',
		'practicas',
		'fprac',
		'cant',
		'coper',
		'factu',
		'hactu',
		'cmotivo',
		'paciente',
		'obse',
	),
)); ?>
