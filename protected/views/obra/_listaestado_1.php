<?php
/*
    Lista de Obras de un estado 
    
*/    
?>
<div class='list'>
<?php
  $col = 0;
  $corte = count($model) / 2;
  $p = 99;

  foreach($model as $a => $v) {
    if ($estado==0||$v['Estado']==$estado){
    
      if ($p > $corte) {
        $p = 0;
        if ($col > 0){
          echo '</table></div>';
        }
        echo '<div  class="span5"><table border=0; cellpadding=1>';
        $col=$col+1;
      }
      $p=$p+1;
    ?>
    <tr>
     <td>
      <div class='span4'>
      <?php echo CHtml::link($v['Nombre'],array('detalle','task'=>'detalle','id'=>$a));?>
      </div>
     </td>
     <td>
      <?php /*echo CHtml::image(Estado::model()->estadoImagen($v['Estado']),
                            Estado::model()->estadoNombre($v['Estado']),    
                            array('title'=>Estado::model()->estadoNombre($v['Estado']).' '.$v['FEstado'],
                                  'width'=>16,
                                  'height'=>16)    
                                ); */?>
     </td>   
     <td>
       <?php if(Obra::model()->hasNormas($a)): ?>
         <?php echo CHtml::ajaxlink(CHtml::image(Yii::app()->request->baseUrl.'/images/texto.ico'),
                   array('ajaxnorma','id'=>$a),
                   array(
                     'update'=>'#juiDialog',
                     'complete' => 'function(data) {
                           $("#juiDialog").dialog("open");
                           }',     
                   ),    
                   array(
                     'title'=>'Normas y Procedimientos',
             //        'onclick'=>'$("#juiDialog").dialog("open"); return false;',                 
                   )); ?>
       <?php endif; ?>  
     </td>
     <td>
       <?php echo CHtml::link(
             CHtml::image(Yii::app()->request->baseUrl.'/images/dollar.png',
               'Aranceles',
                array( 
                  'width'=>16,
                  'height'=>16   
                )
              ),
              array('detalle','task'=>'detalle','id'=>$a),
              array( 
                'title'=>'Aranceles',
              )
          );?>
     </td>

     <td width=30px>
     </td>
    </tr> 

    <?php     
    }
  }
  ?>
  </table></div>  
</div>
