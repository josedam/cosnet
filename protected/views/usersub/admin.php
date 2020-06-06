<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);
/*
$this->menu=array(
	array('label'=>'Crear Usersub','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usersub-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar Usuarios</h3>
<div class='span6'>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'usersub-grid',
	'dataProvider'=>$model->search(),
	'template'=>'{items}{pager}',
	//'filter'=>$model,
	'columns'=>array(
		'username',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update} {delete}',
			'buttons'=>array(
			  'update'=>array(
			     'label'=>'Modificar',
			     'icon'=>'edit',
			  ),
			
			
			
			
			),
		),
	),
)); ?>

</div>
