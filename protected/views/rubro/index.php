<?php
$this->breadcrumbs=array(
	'Rubros',
);

$this->menu=array(
	array('label'=>'Nuevo Rubro','url'=>array('create')),
	array('label'=>'Administar Rubro','url'=>array('admin')),
);
?>

<h1>Rubros</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
