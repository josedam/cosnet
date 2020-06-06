<div>
<h2><?php echo $model['Nombre']; ?></h2>

<div style="float:right;">
  <div class='btn' title='Estado del Convenio'>
   <?php echo CHtml::image(Estado::model()->estadoImagen($model['Estado']),'Estado',array('width'=>16,'height'=>16)); ?>
   <?php echo ' '.Estado::model()->estadoNombre($model['Estado']); ?>
   <?php if($model['Estado']>1): ?>
    <?php echo ' '.$model['FEstado']?>
   <?php endif; ?>
  </div> 
  
 <?php if(Obra::model()->hasNormas($id)): ?>
       <?php echo CHtml::ajaxlink(CHtml::image(Yii::app()->request->baseUrl.'/images/texto.ico').' Normas',
                 array('ajaxnorma','id'=>$id),
                 array(
                   'update'=>'#juiDialog',
                   'complete' => 'function(data) {
                         $("#juiDialog").dialog("open");
                         }',     
                 ),    
                 array(
                   'class'=>'btn',
                   'title'=>'Normas y Procedimientos',
                 )); ?>
 <?php endif; ?>      
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'juiDialog',
                'options'=>array(
                    'title'=>'Normas y Procedimientos',
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'800',
                    'height'=>'500',
                    'scrolling'=>'no',
                    'resizable'=>false,
                    'scrollable'=>false,
                    'closeOnEscape' => true,                    
                    
                ),
                ));  

$this->endWidget(); ?>

</div>
</div>

<?php if($model['Denom']): ?>
  <b><?php echo $model['Denom']; ?></b><br>
<?php endif; ?>    
<?php if($model['Gerencia']): ?>
  Gerenciada por <b><?php echo $model['Gerencia'] ?></b><br>
<?php endif; ?>  

<h3>Aranceles Vigentes a la fecha</h3><br>


<table class="table " id="yw0">

<tr>
 <th><div class="span1">Codigo</div></th>
 <th><div class="span6">Denominacion</div></th>
 <th><div class="span1" align="right">Importe</div></th>
 <th><div class="span1" align="right">Coseguro</div></th>
 <th><div class="span1">F.Arancel</div></th>
</tr> 

<?php foreach($model['Arancel'] as $a => $v): ?>
<?php if($v['Valor']!=0):?>
<tr>
 <td><?php echo $v['CPrac'] ?></td>
 <td><?php echo $v['Deno'] ?></td>
 <td><div align="right"><?php echo $v['Valor']==0?'':$v['Valor'] ?></div></td>
 <td><div align="right"><?php echo $v['Coseg']==0?'':$v['Coseg'] ?></div></td>
 <td><?php echo $v['FArn'] ?></td>
</tr>
<?php endif;?> 
<?php endforeach; ?>     
</table> 


