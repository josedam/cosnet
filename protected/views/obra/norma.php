<?php
$this->breadcrumbs=array(
	'Obras'=>array('admin'),
	'Normas',
);

$this->menu=array(
    array('label'=>'Listar Obra','url'=>array('index')),
  //  array('label'=>'Nueva Obra','url'=>array('create')),
  //  array('label'=>'Detalle Obra','url'=>array('view','id'=>$model->idobra)),
  //  array('label'=>'Administrar Obra','url'=>array('admin')),
);
?>

<h1><?php echo $model->idobra.' '.$model->nombre; ?></h1>
<h3><?php echo $model->razon; ?></h3>


<?php echo $this->renderPartial('_formnorma',array('model'=>$model)); ?>
