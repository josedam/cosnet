<?php
$this->breadcrumbs=array(
	'Empresaitems'=>array('index'),
	$model->idempresaitem=>array('view','id'=>$model->idempresaitem),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Empresaitem','url'=>array('index')),
	array('label'=>'Nuevo Empresaitem','url'=>array('create')),
	array('label'=>'Detalle Empresaitem','url'=>array('view','id'=>$model->idempresaitem)),
	array('label'=>'Administrar Empresaitem','url'=>array('admin')),
);
?>

<h1>Actualizar Empresaitem <?php echo $model->idempresaitem; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>