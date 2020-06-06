<?php
$this->breadcrumbs=array(
	'Facrcps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Nuevo Facrcp','url'=>array('create')),
	array('label'=>'Administrar Facrcp','url'=>array('admin')),
);
?>

<h1>Registro e Recepcion <?php echo $model->oPeriodo:AsText(); ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>