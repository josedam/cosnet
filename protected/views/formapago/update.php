<?php
/* @var $this FormapagoController */
/* @var $model Formapago */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	$model->idformapago=>array('view','id'=>$model->idformapago),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formapago', 'url'=>array('index')),
	array('label'=>'Create Formapago', 'url'=>array('create')),
	array('label'=>'View Formapago', 'url'=>array('view', 'id'=>$model->idformapago)),
	array('label'=>'Manage Formapago', 'url'=>array('admin')),
);
?>

<h1>Update Formapago <?php echo $model->idformapago; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>