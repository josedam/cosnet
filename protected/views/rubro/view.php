<?php
$this->breadcrumbs=array(
	'Rubros'=>array('index'),
	$model->idrubro,
);

$this->menu=array(
	array('label'=>'Listar Rubro','url'=>array('index')),
	array('label'=>'Nuevo Rubro','url'=>array('create')),
	array('label'=>'Actualizar Rubro','url'=>array('update','id'=>$model->idrubro)),
	array('label'=>'Borrar Rubro','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idrubro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Rubro','url'=>array('admin')),
);
?>

<h1>Detalle Rubro #<?php echo $model->idrubro; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idrubro',
		'nombre',
	),
)); ?>
