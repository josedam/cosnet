<?php
$this->breadcrumbs=array(
	'Bhtrans',
);

$this->menu=array(
	array('label'=>'Nuevo Bhtrans','url'=>array('create')),
	array('label'=>'Administar Bhtrans','url'=>array('admin')),
);
?>

<h1>Bhtrans</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
