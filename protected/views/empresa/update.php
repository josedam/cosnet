<?php
/*
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->idempresa=>array('view','id'=>$model->idempresa),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Empresa','url'=>array('index')),
	array('label'=>'Nuevo Empresa','url'=>array('create')),
	array('label'=>'Detalle Empresa','url'=>array('view','id'=>$model->idempresa)),
	array('label'=>'Administrar Empresa','url'=>array('admin')),
);*/
?>

<h1><?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>