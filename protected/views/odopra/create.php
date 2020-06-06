<?php
$this->breadcrumbs=array(
	'Odopras'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Odopra','url'=>array('index')),
	array('label'=>'Administrar Odopra','url'=>array('admin')),
);
?>

<h1>Nuevo Odopra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>