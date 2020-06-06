<?php
$this->breadcrumbs=array(
	'Periodos'=>array('index'),
	$model->periodo=>array('admin'),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Administrar Periodo','url'=>array('admin')),
);
?>

<h1>Actualizar Facperiodo <?php echo $model->oPeriodo()->AsText(); ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>