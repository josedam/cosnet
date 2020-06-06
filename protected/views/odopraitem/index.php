<?php
$this->breadcrumbs=array(
	'Odopraitems',
);

$this->menu=array(
	array('label'=>'Nuevo Odopraitem','url'=>array('create')),
	array('label'=>'Administar Odopraitem','url'=>array('admin')),
);
?>

<h1>Odopraitems</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
