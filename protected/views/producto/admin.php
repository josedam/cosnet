<?php /*
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Producto','url'=>array('index')),
	array('label'=>'Crear Producto','url'=>array('create')),
);
*/ 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('producto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Productos</h1>

<?php /*
<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(true), // search(todos)
	'filter'=>$model,
	'columns'=>array(
	//	'idproducto',
		array(
		  'name'=>'idrubro',
		  'value'=>'$data->rubro->nombre',
		  'htmlOptions'=>array('style'=>'width:40px;'),
		  'filter'=>Rubro::model()->allOptions,
		),
	//	'prcod',
	//	'barras',
	    array(
	      'name'=>'rub',
	      'header'=>'Rub',
	      'value'=>'$data->rubro->alaventa',
	      'htmlOptions'=>array('style'=>'width:20px;'),
	      'filter'=>'',
	    ),

		array(
		  'name'=>'nombre',
		  'htmlOptions'=>array('style'=>'width:230px;'),
		),
		
	//	'preciocompra',
		
		array(
		  'name'=>'precioventa',
		  'htmlOptions'=>array('style'=>'width:30px;text-align:center;'),
	//	  'headerHtmlOptions'=>array('style'=>'width:30px;'),
		
		),

		array(
		  'name'=>'cantidad',
		  'htmlOptions'=>array('style'=>'width:30px;text-align:center;'),
	//	  'headerHtmlOptions'=>array('style'=>'width:30px;'),
		),

        array(
          'name'=>'puntopedido',
          'htmlOptions'=>array('style'=>'width:30px;text-align:center;'),
    //      'headerHtmlOptions'=>array('style'=>'width:30px;'),
        ),
		
	//	'puntopedido',
        array(
          'name'=>'activo',
          'htmlOptions'=>array('style'=>'width:30px;text-align:center;'),
    //      'headerHtmlOptions'=>array('style'=>'width:30px;'),
        ),
		
//		'publicado',
        array(
          'name'=>'alaventa',
          'htmlOptions'=>array('style'=>'width:30px;text-align:center;'),
      //    'headerHtmlOptions'=>array('style'=>'width:30px;'),
        ),
		
//		'muestraprecio',
	
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); ?>
