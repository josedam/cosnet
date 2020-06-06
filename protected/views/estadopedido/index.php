<?php
$this->breadcrumbs=array(
	'Estadopedidos',
);

$this->menu=array(
	array('label'=>'Nuevo Estadopedido','url'=>array('create')),
	array('label'=>'Administar Estadopedido','url'=>array('admin')),
);
?>

<h1>Estadopedidos</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
