<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Actualizar',
);
/*
$this->menu=array(
	array('label'=>'Administrar Usuarios','url'=>array('admin')),
	array('label'=>'Nuevo Usuario','url'=>array('create')),
    array('label'=>'Borrar Usuario','url'=>array('view','id'=>$model->id)),
); */
?>

<h3>Actualizar Usuario <?php echo $model->nombre; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
