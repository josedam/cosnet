<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->idestado=>array('view','id'=>$model->idestado),
	'Update',
);

$this->menu=array(
	array('label'=>'List Estado', 'url'=>array('index')),
	array('label'=>'Create Estado', 'url'=>array('create')),
	array('label'=>'View Estado', 'url'=>array('view', 'id'=>$model->idestado)),
	array('label'=>'Manage Estado', 'url'=>array('admin')),
);
?>

<h1>Update Estado <?php echo $model->idestado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>