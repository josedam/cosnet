<?php /*
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Producto','url'=>array('index')),
	array('label'=>'Administrar Producto','url'=>array('admin')),
);*/
?>

<h1>Nuevo Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
