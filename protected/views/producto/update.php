<?php /*
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->idproducto=>array('view','id'=>$model->idproducto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Producto','url'=>array('index')),
	array('label'=>'Nuevo Producto','url'=>array('create')),
	array('label'=>'Detalle Producto','url'=>array('view','id'=>$model->idproducto)),
	array('label'=>'Administrar Producto','url'=>array('admin')),
); */
?>

<h1>Actualizar Producto <?php echo $model->idproducto; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
