<?php
/* @var $this FormapagoController */
/* @var $model Formapago */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formapago', 'url'=>array('index')),
	array('label'=>'Manage Formapago', 'url'=>array('admin')),
);
?>

<h1>Create Formapago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>