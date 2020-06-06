<?php
$this->breadcrumbs=array(
	'Obras'=>array('index'),
	$model->idobra,
);

$this->menu=array(
	array('label'=>'Listar Obra','url'=>array('index')),
	array('label'=>'Nuevo Obra','url'=>array('create')),
	array('label'=>'Actualizar Obra','url'=>array('update','id'=>$model->idobra)),
	array('label'=>'Borrar Obra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idobra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Obra','url'=>array('admin')),
);
?>

<h1>Detalle Obra #<?php echo $model->idobra; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idobra',
		'nombre',
		'gerencia',
		'cest',
		'fest',
		'calle',
		'barrio',
		'localidad',
		'provincia',
		'cpos',
		'email',
		'fnew',
		'fmod',
		'tcoseg',
	),
)); ?>
