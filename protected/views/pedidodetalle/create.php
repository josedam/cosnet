<?php
$this->breadcrumbs=array(
	'Pedidodetalles'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Pedidodetalle','url'=>array('index')),
	array('label'=>'Administrar Pedidodetalle','url'=>array('admin')),
);
?>

<h1>Nuevo Pedidodetalle</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>