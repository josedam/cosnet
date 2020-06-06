<?php
$this->breadcrumbs=array(
	'Usersubs'=>array('index'),
	$model->idusersub=>array('view','id'=>$model->idusersub),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Usersub','url'=>array('index')),
	array('label'=>'Nuevo Usersub','url'=>array('create')),
	array('label'=>'Detalle Usersub','url'=>array('view','id'=>$model->idusersub)),
	array('label'=>'Administrar Usersub','url'=>array('admin')),
);
?>

<h1>Actualizar Usersub <?php echo $model->idusersub; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>