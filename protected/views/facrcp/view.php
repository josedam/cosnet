<?php
$this->breadcrumbs=array(
	'Facrcps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Facrcp','url'=>array('index')),
	array('label'=>'Nuevo Facrcp','url'=>array('create')),
	array('label'=>'Actualizar Facrcp','url'=>array('update','id'=>$model->id)),
	array('label'=>'Borrar Facrcp','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Facrcp','url'=>array('admin')),
);
?>

<h1>Detalle Facrcp #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'periodo',
		'csoc',
		'cantidad',
		'iduser',
		'fecha',
		'observaciones',
		'fechaimpresion',
	),
)); ?>
