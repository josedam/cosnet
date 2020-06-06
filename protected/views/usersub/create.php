<?php
$this->breadcrumbs=array(
	'Usersubs'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Usersub','url'=>array('index')),
	array('label'=>'Administrar Usersub','url'=>array('admin')),
);
?>

<h1>Nuevo Usersub</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>