<?php
$this->breadcrumbs=array(
	'Lqcptos',
);

$this->menu=array(
	array('label'=>'Nuevo Lqcpto','url'=>array('create')),
	array('label'=>'Administar Lqcpto','url'=>array('admin')),
);
?>

<h1>Lqcptos</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
