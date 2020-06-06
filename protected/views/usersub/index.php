<?php
$this->breadcrumbs=array(
	'Usersubs',
);

$this->menu=array(
	array('label'=>'Nuevo Usersub','url'=>array('create')),
	array('label'=>'Administar Usersub','url'=>array('admin')),
);
?>

<h1>Usersubs</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
