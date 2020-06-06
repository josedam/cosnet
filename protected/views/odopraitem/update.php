<?php
$this->breadcrumbs=array(
	'Odopraitems'=>array('index'),
	$model->idodopraitem=>array('view','id'=>$model->idodopraitem),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Odopraitem','url'=>array('index')),
	array('label'=>'Nuevo Odopraitem','url'=>array('create')),
	array('label'=>'Detalle Odopraitem','url'=>array('view','id'=>$model->idodopraitem)),
	array('label'=>'Administrar Odopraitem','url'=>array('admin')),
);
?>

<h1>Actualizar Odopraitem <?php echo $model->idodopraitem; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>