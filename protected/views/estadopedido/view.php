<?php
$this->breadcrumbs=array(
	'Estadopedidos'=>array('index'),
	$model->idestadopedido,
);

$this->menu=array(
	array('label'=>'Listar Estadopedido','url'=>array('index')),
	array('label'=>'Nuevo Estadopedido','url'=>array('create')),
	array('label'=>'Actualizar Estadopedido','url'=>array('update','id'=>$model->idestadopedido)),
	array('label'=>'Borrar Estadopedido','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idestadopedido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Estadopedido','url'=>array('admin')),
);
?>

<h1>Detalle Estadopedido #<?php echo $model->idestadopedido; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idestadopedido',
		'nombre',
	),
)); ?>
