<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->idempresa,
);

$this->menu=array(
	array('label'=>'Listar Empresa','url'=>array('index')),
	array('label'=>'Nuevo Empresa','url'=>array('create')),
	array('label'=>'Actualizar Empresa','url'=>array('update','id'=>$model->idempresa)),
	array('label'=>'Borrar Empresa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idempresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Empresa','url'=>array('admin')),
);
?>

<h1>Detalle Empresa #<?php echo $model->idempresa; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idempresa',
		'nombre',
		'comercio',
		'telefonos',
		'observaciones',
	),
)); ?>
