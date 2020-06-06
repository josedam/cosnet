<?php
$this->breadcrumbs=array(
	'Tbcptos'=>array('index'),
	$model->row_id,
);

$this->menu=array(
	array('label'=>'Listar Tbcpto','url'=>array('index')),
	array('label'=>'Nuevo Tbcpto','url'=>array('create')),
	array('label'=>'Actualizar Tbcpto','url'=>array('update','id'=>$model->row_id)),
	array('label'=>'Borrar Tbcpto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->row_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Tbcpto','url'=>array('admin')),
);
?>

<h1>Detalle Tbcpto #<?php echo $model->row_id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'row_id',
		'cpto',
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
