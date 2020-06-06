<?php
$this->breadcrumbs=array(
//	'Obras'=>array('index'),
	'Obras Sociales',
);

$this->menu=array(
//	array('label'=>'Listar Obra','url'=>array('index')),
	array('label'=>'Crear Obra','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('obra-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Obras Sociales</h1>

<?php /*
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
*/ ?>
<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'obra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
        array(
          'name'=>'idobra',
          'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
          'headerHtmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
        ),	
		
		array(
		  'name'=>'nombre',
		  'htmlOptions'=>array('style'=>'width: 200px; text-align: left;'),
		  'headerHtmlOptions'=>array('style'=>'width: 200px; text-align: left;'),
		),
		
		'razon',
//		'gerencia',
        array(
          'name'=>'cest',
          'value'=>'$data->estado->nombre',
          'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
          'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
          'filter' => CHtml::listData(Estado::model()->allData(),'idestado','nombre'), // Colocamos un combo en el filtro         
        ),
        
		array(
		  'name'=>'fest',
          'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
          'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),

		),
		
		/*
		'calle',
		'barrio',
		'localidad',
		'provincia',
		'cpos',
		'email',
		'normas',
		'fnew',
		'fmod',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
            'template'=>'{update} {delete}',
            'buttons'=>array(
         /*       'norma' => array(
                     'label'=>'Normas de Presentacion',
                     'imageUrl'=> Yii::app()->request->baseUrl.'/images/texto.ico',
                     'url'=>'Yii::app()->controller->createUrl("norma",array("id"=>$data->idobra))',
                 ),*/
            ),
		),
	),
)); ?>
