<?php
$this->breadcrumbs=array(
	'Bhtrans'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Bhtrans','url'=>array('index')),
	array('label'=>'Administrar Bhtrans','url'=>array('admin')),
);
?>

<h1>Nuevo Bhtrans</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>