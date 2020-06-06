<?php
$this->breadcrumbs=array(
	'Bhtrans'=>array('index'),
	$model->row_id=>array('view','id'=>$model->row_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Bhtrans','url'=>array('index')),
	array('label'=>'Nuevo Bhtrans','url'=>array('create')),
	array('label'=>'Detalle Bhtrans','url'=>array('view','id'=>$model->row_id)),
	array('label'=>'Administrar Bhtrans','url'=>array('admin')),
);
?>

<h1>Actualizar Bhtrans <?php echo $model->row_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>