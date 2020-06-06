<?php
$this->breadcrumbs=array(
	'Tbcptos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nuevo Concepto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbcpto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Conceptos</h1>

<?php /*
<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>
<div class='span7'>
<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'tbcpto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cpto',
		'crub',
		'deno',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); ?>
</div>
