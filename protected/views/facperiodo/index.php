<?php
$this->breadcrumbs=array(
	'Facperiodos',
);

$this->menu=array(
	array('label'=>'Nuevo Facperiodo','url'=>array('create')),
	array('label'=>'Administar Facperiodo','url'=>array('admin')),
);
?>

<h1>Facperiodos</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
