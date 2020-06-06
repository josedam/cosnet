<?php
$this->breadcrumbs=array(
	'Facperiodos'=>array('index'),
	$model->periodo,
);

$this->menu=array(
	array('label'=>'Listar Facperiodo','url'=>array('index')),
	array('label'=>'Nuevo Facperiodo','url'=>array('create')),
	array('label'=>'Actualizar Facperiodo','url'=>array('update','id'=>$model->periodo)),
	array('label'=>'Borrar Facperiodo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->periodo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Facperiodo','url'=>array('admin')),
);
?>

<h1>Detalle Facperiodo #<?php echo $model->periodo; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'periodo',
		'activo',
	),
)); ?>
