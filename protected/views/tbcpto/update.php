<?php
$this->breadcrumbs=array(
	'Tbcptos'=>array('index'),
	$model->row_id=>array('view','id'=>$model->row_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Nuevo Concepto','url'=>array('create')),
	array('label'=>'Administrar ','url'=>array('admin')),
);
?>

<h1>Actualizar Conepto <?php echo $model->cpto; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>