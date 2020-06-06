<?php
$this->breadcrumbs=array(
	'Empresaitems'=>array('index'),
	$model->idempresaitem,
);

$this->menu=array(
	array('label'=>'Listar Empresaitem','url'=>array('index')),
	array('label'=>'Nuevo Empresaitem','url'=>array('create')),
	array('label'=>'Actualizar Empresaitem','url'=>array('update','id'=>$model->idempresaitem)),
	array('label'=>'Borrar Empresaitem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idempresaitem),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Empresaitem','url'=>array('admin')),
);
?>

<h1>Detalle Empresaitem #<?php echo $model->idempresaitem; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idempresaitem',
		'descripcion',
		'detalle',
		'detalle2',
		'detalle3',
		'empresa_idempresa',
	),
)); ?>
