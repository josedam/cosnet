<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Nuevo',
);
/*
$this->menu=array(
	array('label'=>'Administrar User','url'=>array('admin')),
); */
?>

<h3>Nuevo Usuario</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
