<?php
$this->breadcrumbs=array(
	'Obras Sociales'=>array('index'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
);
?>

<h1>Nueva Obra Social</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
