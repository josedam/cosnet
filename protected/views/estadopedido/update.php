<?php
$this->breadcrumbs=array(
	'Estadopedidos'=>array('index'),
	$model->idestadopedido=>array('view','id'=>$model->idestadopedido),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estadopedido','url'=>array('index')),
	array('label'=>'Nuevo Estadopedido','url'=>array('create')),
	array('label'=>'Detalle Estadopedido','url'=>array('view','id'=>$model->idestadopedido)),
	array('label'=>'Administrar Estadopedido','url'=>array('admin')),
);
?>

<h1>Actualizar Estadopedido <?php echo $model->idestadopedido; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>