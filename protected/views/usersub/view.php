<?php
$this->breadcrumbs=array(
	'Usersubs'=>array('index'),
	$model->idusersub,
);

$this->menu=array(
	array('label'=>'Listar Usersub','url'=>array('index')),
	array('label'=>'Nuevo Usersub','url'=>array('create')),
	array('label'=>'Actualizar Usersub','url'=>array('update','id'=>$model->idusersub)),
	array('label'=>'Borrar Usersub','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idusersub),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usersub','url'=>array('admin')),
);
?>

<h1>Detalle Usersub #<?php echo $model->idusersub; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idusersub',
		'id',
		'username',
	),
)); ?>
