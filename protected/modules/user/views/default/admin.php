<?php
$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
/*	array('label'=>'Listar User','url'=>array('index')),*/
	array('label'=>'Nuevo Usuario','url'=>array('create')),
);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Administrar Usuarios</h1>


<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
       array(
            'name'=>'username',
       /*     'header'=>'#',*/
            'htmlOptions'=>array('style'=>'width: 30px; text-align: left;'),
            'headerHtmlOptions'=>array('style'=>'width: 40px; text-align: left;'),
        ),

       array(
            'name'=>'nombre',
       /*     'header'=>'#',*/
            'htmlOptions'=>array('style'=>'width: 100px; text-align: left;'),
            'headerHtmlOptions'=>array('style'=>'width: 150px; text-align: left;'),
        ),

       array(
            'name'=>'email',
       /*     'header'=>'#',*/
            'htmlOptions'=>array('style'=>'width: 100px; text-align: left;'),
            'headerHtmlOptions'=>array('style'=>'width: 150px; text-align: left;'),
        ),

       array(
            'name'=>'esadmin',
            'header'=>'Mapa',
            'value'=>'$data->esadmin==1?"Si":"No"',
            'htmlOptions'=>array('style'=>'width: 20px; text-align: center;'),
            'headerHtmlOptions'=>array('style'=>'width: 20px; text-align: center;'),
            'filter' => '',
        ),

		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update} {delete} {trabajos}',
			'buttons'=>array(
                'delete' => array
                    (
                     'visible'=>'!$data->esRoot();',
                    ),
                'trabajos' => array
                    (
                     'label'=>'Lugares que administra',
                     'url'=>'Yii::app()->controller->createUrl("/usertrabajo/index",array("u"=>$data->id))',
        			 'imageUrl'=>Yii::app()->request->baseUrl.'/images/casa.ico',
        			),
		    ),
	    ),
))); ?>
