<?php
  $cs = Yii::app()->getClientScript();
  $cs->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
?>

<div class="row">
<div class="span8">
<h3><?php echo $user->nombre.' ('.$user->username.')'; ?></h3>
</div>
<div class="span3">
<?php if(Yii::app()->user->esOperador): ?>
<?php  $this->renderPartial('/liquidacion/_selectprof',array('user'=>$user,'accion'=>'/devolucion/profesional')); ?>
<?php endif; ?>
</div>
</div>

<h3>Devolucion de documentacion</h3>
<div >

<?php echo CHtml::link(' Documentacion Pendiente ',
						array('devolucion/lista','estado'=>1),
						array('class'=>'btn'.($estado==1?' disabled':' '))); ?>


<?php echo CHtml::link(' Documentacion Entregada ',
						array('devolucion/lista','estado'=>2),
						array('class'=>'btn'.($estado==2?' disabled':' '))); ?>

</div>



<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>'devolucion-grid',
	'dataProvider'=>$model->searchSocio($csoc, $estado),
	'template' => '{items} {pager}',
/*	'filter'=>$model,*/
	'columns'=>array(
		//'iddevolucion',
		//'idcaptura',
		//'idregis',
		//'transac',
	//	'cos',

       array(
          'class'=>'CCheckBoxColumn',
          'id'=>'chks',
          'selectableRows'=>'2',
          'visible'=>Yii::app()->user->esOperador&&$estado==1,
        //  'value'=>'$data->idarchivo',
        //  'checked'=>'0',
        ),

      array(
        'header'=>'Factura',
        'name'=>'ffac',
        'value'=>'substr($data->ffac,4,7)',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),
      array(
        'header'=>'Paciente',
        'name'=>'paciente',
        'value'=>'$data->paciente',
        'htmlOptions'=>array('style'=>'width: 220px; text-align: left;'),
        'headerHtmlOptions'=>array('style'=>'width: 220px; text-align: left;'),
      ),		      
      array(
        'header'=>'Obra Social',
        'name'=>'cos',
        'value'=>'$data->obra->nombre',
        'htmlOptions'=>array('style'=>'width: 220px; text-align: left;'),
        'headerHtmlOptions'=>array('style'=>'width: 220px; text-align: left;'),
      ),		
     array(
        'header'=>'Observaciones',
        'name'=>'obse',
        'value'=>'$data->obse',
        'htmlOptions'=>array('style'=>'width: 300px; text-align: left;'),
        'headerHtmlOptions'=>array('style'=>'width: 300px; text-align: left;'),
      ),		      
		//'ffac',
		//'npres',
		//'csoc',
		//'tipo',
		//'nlote',
		//'nitem',
		//'practicas',
		//'fprac',
		//'cant',
		//'coper',
		//'factu',
		//'hactu',
	//	'cmotivo',
	//	'paciente',
	//	'obse',
      array(
        'class'=>'bootstrap.widgets.BootButtonColumn',
        'template'=>'{detalle} ',
        'buttons'=>array(
   
            'detalle' => array(
                 	'label'=>'Detalle',
                 	'imageUrl'=> Yii::app()->request->baseUrl.'/images/texto.ico',
                 	'url'=>'Yii::app()->controller->createUrl("detalle",array("id"=>$data->iddevolucion))',
                 	'options'=>array(
                     	'ajax'=>array(
                        	'type'=>'POST',
        //                    'url'=>"js:$(this).attr('href'),YII_CSRF_TOKEN:'".Yii::app()->request->csrfToken."'",
                            'url'=>"js:$(this).attr('href')",
                            'data' => "{'YII_CSRF_TOKEN':'".Yii::app()->request->csrfToken."'}",
        //                    'url'=>"js:$(this).attr('href').'YII_CSRF_TOKEN:'.Yii::app()->request->csrfToken",
        //                    'success'=>"function(data) { jQuery('#pnl-resultado').html(data)}",
                            'success'=>'function(data) { $("#static_mesage .modal-body").html(data); $("#static_mesage").modal(); }'
                        ),
                  	),                 
             //    'options'=>array('target'=>'_blank'),
             ),

         ),
      ),		
	),
)); ?>


<div id="static_mesage" class="modal hide" role="dialog" style="margin-top:10%;" data-backdrop="static" data-keyboard="true"  >
    <div class="modal-dialog modal-sm">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Detalle</h3>
      </div>
 
      <div class="modal-body" >
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('devolucion-grid');
}
//setInterval("reloadGrid()",120000);
</script>

<?php
  if (Yii::app()->user->esOperador&&$estado==1){

   	echo CHtml::ajaxLink('<i class="icon-search"></i> Entregar Documentacion', 
   	                     Yii::app()->createUrl('devolucion/ajaxentregar'),
        array(
           'type'=>'POST',
           'data'=>'js:{chks : $.fn.yiiGridView.getChecked("devolucion-grid","chks"), YII_CSRF_TOKEN : "'.Yii::app()->request->csrfToken.'"}',
           'success'=>'reloadGrid'
        ),
        array(
           'class'=>'btn',
           'title'=>'Entregar Documentacion al Profesional para su refacturacion',
           "rel"=>"tooltip",
 //          'confirm'=>"Esta Seguro que desea Eliminar el Elemento...?",
        )
   	);
  }

?>


