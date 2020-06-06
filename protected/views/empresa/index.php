<?php
$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Nuevo Empresa','url'=>array('create')),
	array('label'=>'Administar Empresa','url'=>array('admin')),
);
?>

<h1>Empresas</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
