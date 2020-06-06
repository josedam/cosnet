<?php
$this->breadcrumbs=array(
	'Pedidodetalles'=>array('index'),
	$model->idpedidodetalle,
);

$this->menu=array(
	array('label'=>'Listar Pedidodetalle','url'=>array('index')),
	array('label'=>'Nuevo Pedidodetalle','url'=>array('create')),
	array('label'=>'Actualizar Pedidodetalle','url'=>array('update','id'=>$model->idpedidodetalle)),
	array('label'=>'Borrar Pedidodetalle','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idpedidodetalle),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Pedidodetalle','url'=>array('admin')),
);
?>

<h1>Detalle Pedidodetalle #<?php echo $model->idpedidodetalle; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idpedidodetalle',
		'idpedido',
		'idproducto',
		'cantidad',
		'preciounitario',
		'preciototal',
	),
)); ?>
