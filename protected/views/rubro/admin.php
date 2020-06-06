<?php
$this->breadcrumbs=array(
	'Rubros'=>array('index'),
	'Administrar',
);

$this->menu=array(
//	array('label'=>'Listar Rubro','url'=>array('index')),
	array('label'=>'Crear Rubro','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rubro-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Rubros</h1>

<div class='span6'>
<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'rubro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	    array(
	      'name'=>'idrubro',
	      'htmlOptions'=>array('style'=>'width:70px;'),
	      
	    ),
		'nombre',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); ?>
</div>
