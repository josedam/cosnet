<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Nuevo User','url'=>array('create')),
	array('label'=>'Administar User','url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
