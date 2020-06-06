<?php
$this->breadcrumbs=array(
	'Odopras'=>array('index'),
	$model->idodopra=>array('view','id'=>$model->idodopra),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Odopra','url'=>array('index')),
	array('label'=>'Nuevo Odopra','url'=>array('create')),
	array('label'=>'Detalle Odopra','url'=>array('view','id'=>$model->idodopra)),
	array('label'=>'Administrar Odopra','url'=>array('admin')),
);
?>

<h1>Actualizar Odopra <?php echo $model->idodopra; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>