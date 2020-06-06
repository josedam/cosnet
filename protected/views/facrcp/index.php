<?php
$this->breadcrumbs=array(
	'Facrcps',
);

$this->menu=array(
	array('label'=>'Nuevo Facrcp','url'=>array('create')),
	array('label'=>'Administar Facrcp','url'=>array('admin')),
);
?>

<h1>Facrcps</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
