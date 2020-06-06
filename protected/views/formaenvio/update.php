<?php
/* @var $this FormaenvioController */
/* @var $model Formaenvio */

$this->breadcrumbs=array(
	'Formaenvios'=>array('index'),
	$model->idformaenvio=>array('view','id'=>$model->idformaenvio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formaenvio', 'url'=>array('index')),
	array('label'=>'Create Formaenvio', 'url'=>array('create')),
	array('label'=>'View Formaenvio', 'url'=>array('view', 'id'=>$model->idformaenvio)),
	array('label'=>'Manage Formaenvio', 'url'=>array('admin')),
);
?>

<h1>Update Formaenvio <?php echo $model->idformaenvio; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>