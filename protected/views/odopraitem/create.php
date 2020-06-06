<?php
$this->breadcrumbs=array(
	'Odopraitems'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Odopraitem','url'=>array('index')),
	array('label'=>'Administrar Odopraitem','url'=>array('admin')),
);
?>

<h1>Nuevo Odopraitem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>