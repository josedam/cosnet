<?php
$this->breadcrumbs=array(
	'Facrcps'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Crear Facrcp','url'=>array('create')),
);

?>

<h1>Recepcion <?php echo $modelPeriodo->oPeriodo()->AsText()?> </h1>


<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'facrcp-grid',
	'dataProvider'=>$model->searchPeriodo($modelPeriodo),
//	'filter'=>$model,
	'columns'=>array(
		//'periodo',

		array(
		'name'=>'csoc',
		'type'=>'raw',
		'value'=>'$data->profesional->nombre',
		//'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 300px;'),
		//'filter' => CHtml::listData(Model::model()->allData(),'id','field'),
		),

		array(
		'name'=>'cantidad',
		//'type'=>'raw',
		//'value'=>'$data->operador->username',
		//'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 60px; text-align: center;'),
		//'filter' => NIL,
		),

		array(
		'name'=>'fecha',
		//'type'=>'raw',
		//'value'=>'$data->operador->username',
		'htmlOptions'=>array('style'=>'width: 150px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 150px; text-align: center;'),
		//'filter' => NIL, //CHtml::listData(Model::model()->allData(),'id','field'),
		),		

		array(
		'name'=>'iduser',
		'type'=>'raw',
		'value'=>'$data->operador->username',
		'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 100px;text-align: center; '),
		//'filter' => NIL, //CHtml::listData(Model::model()->allData(),'id','field'),
		),

		array(
		'name'=>'observaciones',
		//'type'=>'raw',
		//'value'=>'$data->operador->username',
		'htmlOptions'=>array('style'=>'width: 200px; text-align: left;'),
		'headerHtmlOptions'=>array('style'=>'width: 200px;text-align: left; '),
		//'filter' => NIL, //CHtml::listData(Model::model()->allData(),'id','field'),
		),		
		
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
				'delete'=>array(
					'visible'=>'Yii::app()->user->esRoot;',
					),
			),
		),

	),
)); ?>
