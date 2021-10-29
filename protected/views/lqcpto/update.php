<?php
$this->breadcrumbs=array(
	'Lqcptos'=>array('index'),
	$model->idlqcpto=>array('view','id'=>$model->idlqcpto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Nuevo Concepto','url'=>array('create')),
	array('label'=>'Administrar ','url'=>array('admin')),
);
?>

<h1>Actualizar</h1> 
<!-- <h3><?php echo $model->idlqcpto; ?></h3> -->

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>