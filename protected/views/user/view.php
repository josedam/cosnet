<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar User','url'=>array('index')),
	array('label'=>'Nuevo User','url'=>array('create')),
	array('label'=>'Actualizar User','url'=>array('update','id'=>$model->id)),
	array('label'=>'Borrar User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar User','url'=>array('admin')),
);
?>

<h1>Detalle Usuario [<?php echo $model->id; ?>]</h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'nombre',
		'email',
        'esadmin',
	),
)); ?>
