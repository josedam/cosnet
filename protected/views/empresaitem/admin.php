<?php
/*
$this->breadcrumbs=array(
	'Empresaitems'=>array('index'),
	'Administrar',
);
*/
/*
$this->menu=array(
	array('label'=>'Listar Empresaitem','url'=>array('index')),
	array('label'=>'Crear Empresaitem','url'=>array('create')),
);
*/

?>

<h1><?php echo CHtml::encode($modelEmpresa->nombre); ?></h1>

<div style="margin-top: 20px;margin-bottom: 20px;margin-left: 30px;">
	
<?php echo $this->renderPartial('//empresa/_view',array('data'=>$modelEmpresa)); ?>
</div>


	<div style="margin-top: 0px;">	
		<?php echo CHtml::link('Nuevo Item', Yii::app()->controller->createUrl("create"),
										 array('class'=>'btn') )?>
		<?php echo CHtml::link('Retornar', Yii::app()->controller->createUrl("//empresa/admin"),
										 array('class'=>'btn') )?>
	</div>



<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'empresaitem-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'idempresaitem',
       array(
          'name'=>'descripcion',
          'type'=>'raw',
       	  'value'=>'CHtml::link($data->descripcion,
                    Yii::app()->controller->createUrl("update",array("id"=>$data->idempresaitem))
       	           )',

   //       'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
   //       'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
   //       'filter' => CHtml::listData(Estado::model()->allData(),'idestado','nombre'), // Colocamos un combo en el filtro         
        ),

		'detalle',
	

	//	'detalle3',
//		'empresa_idempresa',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); ?>
