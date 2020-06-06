<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'facrcp-grid',
	'dataProvider'=>$model->search(), /*$model),*/
	'emptyText'=>'',
	'enablePagination'=>false,
	'template'=>'{items}',

	'columns'=>array(
		/*	
		array(
		'name'=>'cantidad',
		//'type'=>'raw',
		//'value'=>'$data->operador->username',
		//'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 30px; text-align: center;'),
		'filter' => NIL,
		'header'=>'Cant',
		),
		*/

		array(
		'name'=>'fecha',
		//'type'=>'raw',
		//'value'=>'$data->operador->username',
		'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
		//'filter' => NIL, //CHtml::listData(Model::model()->allData(),'id','field'),
		),		

		array(
		'name'=>'iduser',
		'type'=>'raw',
		'value'=>'$data->operador->username',
		'htmlOptions'=>array('style'=>'width: 80px; text-align: center;'),
		'headerHtmlOptions'=>array('style'=>'width: 80px;text-align: center; '),
		//'filter' => CHtml::listData(Model::model()->allData(),'id','field'),
		),

		array(
		'name'=>'observaciones',
		//'type'=>'raw',
		//'value'=>'$data->operador->username',
		'htmlOptions'=>array('style'=>'width: 150px; text-align: left;'),
		'headerHtmlOptions'=>array('style'=>'width: 150px;text-align: left; '),
		//'filter' => CHtml::listData(Model::model()->allData(),'id','field'),
		),		
	
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{imprimir}',
			'buttons'=>array(
				'imprimir'=>array(
					'label'=>'Emitir Comprobante',
					'type'=>'html',
                   	'url'=>'Yii::app()->controller->createUrl("/facrcp/imprimir",array("id"=>$data->id))',
                   	'icon'=>'print',
                   //	'options'=>array('target'=>'_blank'),
				),

			),
		),

	),
)); ?>

<?php /*$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->search($model),
    'itemView'=>'_itemView',   // refers to the partial view named '_post'
));*/
?>

