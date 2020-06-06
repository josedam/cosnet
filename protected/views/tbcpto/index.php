<?php
$this->breadcrumbs=array(
	'Tbcptos',
);

$this->menu=array(
	array('label'=>'Nuevo Tbcpto','url'=>array('create')),
	array('label'=>'Administar Tbcpto','url'=>array('admin')),
);
?>

<h1>Tbcptos</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
