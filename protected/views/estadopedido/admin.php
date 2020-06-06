<?php
$this->breadcrumbs=array(
	'Estadopedidos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Estadopedido','url'=>array('index')),
	array('label'=>'Crear Estadopedido','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('estadopedido-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Estadopedidos</h1>

<p>
Opcional puede ingresar los operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de los valores a buscar, para especificar la forma en que se realizara la busqueda.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'estadopedido-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idestadopedido',
		'nombre',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
