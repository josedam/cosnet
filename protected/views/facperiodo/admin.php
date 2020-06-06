<?php
$this->breadcrumbs=array(
	'Periodos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nuevo Periodo','url'=>array('create')),
	array('label'=>'Detalle Recepcion','url'=>array('facrcp/admin')),
);

?>

<h1>Administrar Periodos</h1>
<h1><?php echo $periodoactivo->oPeriodo()->AsText();?></h1>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'facperiodo-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'periodo',
		'activo',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{activar} {delete}',

   			'buttons'=>array(

                'activar' => array(
                   'label'=>'Activar',
                   'type'=>'html',
                   'url'=>'Yii::app()->controller->createUrl("activar",array("id"=>$data->periodo))',
                   'icon'=>'ok',
                //   'imageUrl'=>Yii::app()->request->baseUrl.'/images/image.ico',
                   'visible'=>'$data->activo==0;',
                 ),
             ),   			
		),
	),
)); ?>
