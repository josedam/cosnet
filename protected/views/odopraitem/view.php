<?php
$this->breadcrumbs=array(
	'Odopraitems'=>array('index'),
	$model->idodopraitem,
);

$this->menu=array(
	array('label'=>'Listar Odopraitem','url'=>array('index')),
	array('label'=>'Nuevo Odopraitem','url'=>array('create')),
	array('label'=>'Actualizar Odopraitem','url'=>array('update','id'=>$model->idodopraitem)),
	array('label'=>'Borrar Odopraitem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idodopraitem),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Odopraitem','url'=>array('admin')),
);
?>

<h1>Detalle Odopraitem #<?php echo $model->idodopraitem; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idodopraitem',
		'nord',
		'cprac',
		'cant',
		'pieza',
		'cara',
		'cest',
		'idodopra',
	),
)); ?>
