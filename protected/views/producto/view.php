<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->idproducto,
);

$this->menu=array(
	array('label'=>'Listar Producto','url'=>array('index')),
	array('label'=>'Nuevo Producto','url'=>array('create')),
	array('label'=>'Actualizar Producto','url'=>array('update','id'=>$model->idproducto)),
	array('label'=>'Borrar Producto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idproducto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Producto','url'=>array('admin')),
);
?>

<h1>Detalle Producto #<?php echo $model->idproducto; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idproducto',
		'idrubro',
		'prcod',
		'barras',
		'nombre',
		'preciocompra',
		'precioventa',
		'cantidad',
		'puntopedido',
		'activo',
		'publicado',
		'alaventa',
		'muestraprecio',
	),
)); ?>
