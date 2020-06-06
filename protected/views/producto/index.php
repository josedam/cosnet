<?php
$this->breadcrumbs=array(
	'Productos',
);

$this->menu=array(
	array('label'=>'Nuevo Producto','url'=>array('create')),
	array('label'=>'Administar Producto','url'=>array('admin')),
);
?>

<h1>Productos</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
