<?php
$this->breadcrumbs=array(
	'Odopras',
);

$this->menu=array(
	array('label'=>'Nuevo Odopra','url'=>array('create')),
	array('label'=>'Administar Odopra','url'=>array('admin')),
);
?>

<h1>Odopras</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
