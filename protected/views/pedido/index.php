<?php
$this->breadcrumbs=array(
	'Pedidos',
);

$this->menu=array(
	array('label'=>'Nuevo Pedido','url'=>array('create')),
	array('label'=>'Administar Pedido','url'=>array('admin')),
);
?>

<h1>Pedidos</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
