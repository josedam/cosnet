<?php
$this->breadcrumbs=array(
	'Pedidodetalles',
);

$this->menu=array(
	array('label'=>'Nuevo Pedidodetalle','url'=>array('create')),
	array('label'=>'Administar Pedidodetalle','url'=>array('admin')),
);
?>

<h1>Pedidodetalles</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
