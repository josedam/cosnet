
<div class="row">
<div class="span8">
<h3><?php echo $user->nombre.' ('.$user->username.')'; ?></h3>
</div>
<div class="span3">
<?php if(Yii::app()->user->esOperador): ?>
<?php  $this->renderPartial('_selectprof',array('user'=>$user,'accion'=>'/liquidacion/profesional')); ?>
<?php endif; ?>
</div>
</div>



<b>Resumen de Liquidacion</b>
<br>
<?php // 'zii.widgets.grid.CGridView'
  $this->widget('bootstrap.widgets.BootGridView', array(
    'dataProvider' => $model->searchSocio($csoc),
    'template' => '{items} {pager}',
    'columns' => array(
      array(
        'name'=>'NroLiq',
        'header'=>'Liq.No',
        'value'=>'$data->nroliq',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),
      array(
        'header'=>'Fecha',
        'name'=>'FLiq',
        'value'=>'$data->fliq',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),
      array(
        'header'=>'Imp.Bruto',
        'name'=>'Bruto',
        'value'=>'number_format($data->bruto,2)',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: right;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),
      array(
        'header'=>'Imp.Neto',
        'name'=>'Neto',
        'value'=>'number_format($data->neto,2)',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: right;'),
        'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
      ),
      array(
        'header'=>'Cbte.Numero',
        'name'=>'Cbte',
        'value'=>'$data->tcbte." ".$data->ncbte',
        'htmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
         'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
      ),
      array(
        'header'=>'Cbte.Fecha',
        'name'=>'FEmi',
        'value'=>'$data->femi',
        'htmlOptions'=>array('style'=>'width: 70px; text-align: center;'),
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
      ),
      
      
      
    ),
));

?>

