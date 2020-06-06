<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Administrar',
);
/*
$this->menu=array(
	array('label'=>'Listar Empresa','url'=>array('index')),
	array('label'=>'Crear Empresa','url'=>array('create')),
);
*/
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('empresa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
-*/
?>

<h1>Empresas Tarjeta</h1>

<div style="margin-top: 10px;">	
<?php echo CHtml::link('Nueva Empresa', Yii::app()->controller->createUrl("create"),
									 array('class'=>'btn') )?>
</div>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
       array(
          'name'=>'nombre',
          'type'=>'raw',
       	  'value'=>'CHtml::link($data->nombre,
                    Yii::app()->controller->createUrl("detalle",array("id"=>$data->idempresa))
       	           )',

   //       'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
   //       'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
   //       'filter' => CHtml::listData(Estado::model()->allData(),'idestado','nombre'), // Colocamos un combo en el filtro         
        ),

		array(
			'header'=>'Observaciones',
			'type'=>'raw',
			'value'=>'$data->datosGenerales()',
		),

		array(
			'header'=>'Planes',
			'type'=>'raw',
			'value'=>'$data->detalleItems()',
		),


	//	'comercio',
	//	'telefonos',
	//	'observaciones',
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
