<?php
$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->idpedido=>array('view','id'=>$model->idpedido),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Pedido','url'=>array('index')),
	array('label'=>'Nuevo Pedido','url'=>array('create')),
	array('label'=>'Detalle Pedido','url'=>array('view','id'=>$model->idpedido)),
	array('label'=>'Administrar Pedido','url'=>array('admin')),
);
?>

<h1>Actualizar Pedido <?php echo $model->idpedido; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>