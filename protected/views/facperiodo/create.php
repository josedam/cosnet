<?php
$this->breadcrumbs=array(
	'Periodos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Administrar Facperiodo','url'=>array('admin')),
);
?>

<h1>Nuevo Periodo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>