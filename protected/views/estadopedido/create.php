<?php
$this->breadcrumbs=array(
	'Estadopedidos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Estadopedido','url'=>array('index')),
	array('label'=>'Administrar Estadopedido','url'=>array('admin')),
);
?>

<h1>Nuevo Estadopedido</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>