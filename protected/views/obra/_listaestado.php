<?php
/*
    Lista de Obras de un estado 
    
*/    
?>

  <div  class="span5 ">
    <table border=0; cellpadding=1>
      <?php foreach($model as $a => $v) : ?>
        <?php if ($estado==0||$v->cest==$estado): ?>

        <tr>
         <td>
            <?php echo CHtml::ajaxLink($v->nombre,
                         array('ajaxdetalle','task'=>'detalle','id'=>$v->idobra),
                         array('update'=>'#pane-arn')                       
                         );?>
                         
           <?php /* echo CHtml::Link($v->nombre,
                         array('ajaxdetalle','id'=>$v->idobra)
                         );*/ ?>
             
         </td>
        </tr> 

        <?php endif; ?>
      <?php endforeach; ?>
    </table>
  </div>

