<?php
$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->idpedido,
);

$this->menu=array(
	array('label'=>'Listar Pedido','url'=>array('index')),
	array('label'=>'Nuevo Pedido','url'=>array('create')),
	array('label'=>'Actualizar Pedido','url'=>array('update','id'=>$model->idpedido)),
	array('label'=>'Borrar Pedido','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idpedido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Pedido','url'=>array('admin')),
);
?>

<h1>Detalle Pedido #<?php echo $model->idpedido; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idpedido',
		'idestadopedido',
		'iduser',
		'numeropedido',
		'fechahora',
		'totalbruto',
		'totalneto',
	),
)); ?>
