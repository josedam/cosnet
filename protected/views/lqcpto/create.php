<?php
$this->breadcrumbs=array(
	'Lqcptos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Administrar ','url'=>array('admin')),
);
?>

<h1>Nuevo Concepto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>