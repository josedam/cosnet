<?php
$this->breadcrumbs=array(
	'Obras',
);

$this->menu=array(
	array('label'=>'Nuevo Obra','url'=>array('create')),
	array('label'=>'Administar Obra','url'=>array('admin')),
);
?>

<h1>Obras</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
