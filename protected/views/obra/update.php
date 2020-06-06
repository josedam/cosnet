<?php
$this->breadcrumbs=array(
	'Obras Sociales'=>array('index'),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Obra','url'=>array('index')),
	array('label'=>'Nueva','url'=>array('create')),
);
?>

<h1>Actualizar Obra Social <?php echo $model->idobra; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
