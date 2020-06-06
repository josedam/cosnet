<?php
$this->breadcrumbs=array(
	'Pedidodetalles'=>array('index'),
	$model->idpedidodetalle=>array('view','id'=>$model->idpedidodetalle),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Pedidodetalle','url'=>array('index')),
	array('label'=>'Nuevo Pedidodetalle','url'=>array('create')),
	array('label'=>'Detalle Pedidodetalle','url'=>array('view','id'=>$model->idpedidodetalle)),
	array('label'=>'Administrar Pedidodetalle','url'=>array('admin')),
);
?>

<h1>Actualizar Pedidodetalle <?php echo $model->idpedidodetalle; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>