<?php
/* @var $this FormaenvioController */
/* @var $model Formaenvio */

$this->breadcrumbs=array(
	'Formaenvios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formaenvio', 'url'=>array('index')),
	array('label'=>'Manage Formaenvio', 'url'=>array('admin')),
);
?>

<h1>Create Formaenvio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>