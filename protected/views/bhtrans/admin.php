<?php
$this->breadcrumbs=array(
	'Bhtrans'=>array('index'),
	'Administrar',
);
/*
$this->menu=array(
	array('label'=>'Listar Bhtrans','url'=>array('index')),
	array('label'=>'Crear Bhtrans','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bhtrans-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Liquidacion Tarjetas</h1>


<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'bhtrans-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'row_id',
		//'nroliq',
		//'apyn',

     array(
        'name'=>'facre',
        'header'=>'F.Liq',
        'value'=>'$data->facre',
     //   'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
     //   'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),


      array(
        'name'=>'csoc',
        'header'=>'MP',
        'value'=>'$data->csoc',
      //  'htmlOptions'=>array('style'=>'width: 20px; text-align: center;'),
      //  'headerHtmlOptions'=>array('style'=>'width: 20px; text-align: center;'),
      ), 

      array(
        'name'=>'apyn',
        'header'=>'Profesional',
        'value'=>'$data->apyn',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: left;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: left;'),
      ), 

      array(
        'name'=>'nombre',
        'header'=>'Paciente',
        'value'=>'$data->nombre',
      //  'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      //  'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 


      array(
        'name'=>'tarjeta',
        'header'=>'Tarjeta',
        'value'=>'$data->tarjeta',
      //  'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      //  'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),

     array(
        'name'=>'plan',
        'header'=>'Plan',
        'value'=>'$data->plan',
     //   'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
     //   'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 

      array(
        'name'=>'fcupon',
        'header'=>'F.Cupon',
        'value'=>'$data->fcupon',
     //   'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
     //   'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 

      array(
        'name'=>'ncupon',
        'header'=>'N.Cupon',
        'value'=>'$data->ncupon',
      //  'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      //  'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 		

      array(
        'name'=>'impcupon',
        'header'=>'Importe',
        'value'=>'$data->impcupon',
        //'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        //'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 		

      array(
        'name'=>'dctotarj',
        'header'=>'Desc.Tarjeta',
        'value'=>'$data->dctotarj',
       // 'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
       // 'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 		

      array(
        'name'=>'dctocirc',
        'header'=>'Desc.COS',
        'value'=>'$data->dctocirc',
       // 'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
       // 'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),		
      array(
        'name'=>'imp',
        'header'=>'Total',
        'value'=>'$data->imp',
    //    'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
     //   'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 

      array(
        'name'=>'frmpgo',
        'header'=>'Frm.Pago',
        'value'=>'$data->frmpgo',
       // 'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
       // 'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), 		


/*      array(
        'name'=>'NroLiq',
        'header'=>'Liq.No',
        'value'=>'$data->nroliq',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), */		
	//	'ctcta',
	//	'nctab',
	//	'cbu1',
	
	//	'cbu2',
	//	'tdoc',
	//	'ndoc',
	/*	'facre',
		'imp',
		'csoc',
		'simp',
		'tarjeta',
		'nombre',
		'fcupon',
		'ncupon',
		'impcupon',
		'plan',
		'dctotarj',
		'dctocirc',
		'frmpgo',
	*/
	/*
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
*/		
	),
)); ?>
