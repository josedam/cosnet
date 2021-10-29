<?php
$this->breadcrumbs=array(
	'Lqcptos'=>array('index'),
	$model->idlqcpto,
);

$this->menu=array(
	array('label'=>'Listar Lqcpto','url'=>array('index')),
	array('label'=>'Nuevo Lqcpto','url'=>array('create')),
	array('label'=>'Actualizar Lqcpto','url'=>array('update','id'=>$model->idlqcpto)),
	array('label'=>'Borrar Lqcpto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idlqcpto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Lqcpto','url'=>array('admin')),
);
?>

<h1>Detalle Lqcpto #<?php echo $model->idlqcpto; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idlqcpto',
		'deno',
		'crub',
		'obse',
		'acm_dgi',
		'gen_ddor',
		'bcond',
		'acm',
		'lecop',
	),
)); ?>
