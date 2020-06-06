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
<?php  $this->renderPartial('/liquidacion/_selectprof',array('user'=>$user,'accion'=>'/tarjeta/profesional')); ?>
<?php endif; ?>
</div>
</div>

<h3><?php  //echo Yii::app()->user->nombre.' ('.Yii::app()->user->name.')'; ?></h3>
<br>

<div class='row'>
<div class='span2'>

<?php // 'zii.widgets.grid.CGridView'
  $this->widget('bootstrap.widgets.BootGridView', array(
    'dataProvider' => $model->searchSocio($csoc),
    'template' => '{items} {pager}',
    'columns' => array(

/*      array(
        'name'=>'NroLiq',
        'header'=>'Liq.No',
        'value'=>'$data->nroliq',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ), */
      array(
        'header'=>'Fecha',
        'name'=>'FLiq',
        'type'=>'raw',
/*        'value'=>"CHtml::ajaxLink($data->fliq,
                         array('detalle','lq'=>$data=>nroliq),
                         array('update'=>'#pane-liq')                       
                         )",*/

        'value'=>'CHtml::ajaxLink($data->fliq,
                          Yii::app()->controller->createUrl("detalle",array("lq"=>$data->nroliq)),
                          array("update"=>"#pane-liq")
                          )',
                         
/*       'value'=>'CHtml::Link($data->fliq,
                          Yii::app()->controller->createUrl("detalle",array("lq"=>$data->nroliq))
                          )',
 */                                                  
                         
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),
      
   /*     'value'=>'CHtml::Link($data->fliq,
                          Yii::app()->controller->createUrl("detalle",array("lq"=>$data->nroliq))
                          )',
   */                       
      
      
/*      array(
        'header'=>'Importe',
        'name'=>'Bruto',
        'value'=>'number_format($data->imp,2)',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: right;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),

      array(
        'class'=>'bootstrap.widgets.BootButtonColumn',
        'template'=>'{detalle}',
        'buttons'=>array(
            'detalle' => array(
                 'label'=>'Detalle',
                 'imageUrl'=> Yii::app()->request->baseUrl.'/images/texto.ico',
                 'url'=>'Yii::app()->controller->createUrl("detalle",array("lq"=>$data->nroliq))',
                 'options'=>array('target'=>'_blank'),
             ),
        ),
      ),*/
      
      
      
    ),
));
?>
</div>
<div class='span8'>
<div id='pane-liq'>
  <?php $lq=$model->ultimoNroLiq($csoc); ?>
  <?php if($lq > 0): ?>
    <?php echo $this->actionDetalle($lq,true); ?>
  <?php endif; ?>
</div>

</div>
</div>

