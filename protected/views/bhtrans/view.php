<?php
$this->breadcrumbs=array(
	'Bhtrans'=>array('index'),
	$model->row_id,
);

$this->menu=array(
	array('label'=>'Listar Bhtrans','url'=>array('index')),
	array('label'=>'Nuevo Bhtrans','url'=>array('create')),
	array('label'=>'Actualizar Bhtrans','url'=>array('update','id'=>$model->row_id)),
	array('label'=>'Borrar Bhtrans','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->row_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Bhtrans','url'=>array('admin')),
);
?>

<h1>Detalle Bhtrans #<?php echo $model->row_id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'row_id',
		'nroliq',
		'apyn',
		'ctcta',
		'nctab',
		'cbu1',
		'cbu2',
		'tdoc',
		'ndoc',
		'facre',
		'imp',
		'csoc',
		'simp',
		'tarjeta',
		'nombre',
		'fcupon',
		'ncupon',
		'impcupon',
		'plan',
		'dctotarj',
		'dctocirc',
		'frmpgo',
	),
)); ?>
