<?php
$this->breadcrumbs=array(
	'Empresaitems',
);

$this->menu=array(
	array('label'=>'Nuevo Empresaitem','url'=>array('create')),
	array('label'=>'Administar Empresaitem','url'=>array('admin')),
);
?>

<h1>Empresaitems</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
