<?php
$this->breadcrumbs=array(
	'Odopras'=>array('index'),
	$model->idodopra,
);

$this->menu=array(
	array('label'=>'Listar Odopra','url'=>array('index')),
	array('label'=>'Nuevo Odopra','url'=>array('create')),
	array('label'=>'Actualizar Odopra','url'=>array('update','id'=>$model->idodopra)),
	array('label'=>'Borrar Odopra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idodopra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Odopra','url'=>array('admin')),
);
?>

<h1>Detalle Odopra #<?php echo $model->idodopra; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idodopra',
		'cos',
		'nafil',
		'gpar',
		'ndoc',
		'nord',
		'faut',
		'csoc',
		'coper',
		'fdia',
		'cest',
	),
)); ?>
