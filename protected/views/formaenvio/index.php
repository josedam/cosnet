<?php
/* @var $this FormaenvioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Formaenvios',
);

$this->menu=array(
	array('label'=>'Create Formaenvio', 'url'=>array('create')),
	array('label'=>'Manage Formaenvio', 'url'=>array('admin')),
);
?>

<h1>Formaenvios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
