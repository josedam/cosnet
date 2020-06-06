<div class="row">
    <h4>Fecha de Arancel <?php echo $fa ?> </h4> 
    <?php if($obra->tcoseg==2): ?>
    <div class='alert alert-info'>
    <h4>Coseguro en consultorio</h4>
    </div>
    <?php endif; ?>

    <table class="table " id="yw0">
    <tr>
     <th><div style='width:30px;'>Codigo</div></th>
     <th><div style='width:80px;'>Denominacion</div></th>
     <th><div style='width:50px;' align="right">Importe</div></th>
     <th><div  align="right">Coseguro</div></th>
     <?php if ($obra->tcoseg==2): ?>
       <th><div  align="right">Total</div></th>
     <?php endif; ?>
     <?php /*<th><div >F.Arancel</div></th>  */ ?>
    </tr> 

    <?php foreach($nomen as $a => $v): ?>
      <?php $arn = $v->arancel($fa);?>
      <?php if($arn->valor!=0):?>
        <tr>
         <td><?php echo $v->edCPrac(); ?></td>
         <td><?php echo $v->deno;  ?></td>
         <td><div align="right"><?php echo number_format($arn->valor,2); ?></div></td>
         <td><div align="right"><?php echo $arn->coseg==0?'':number_format($arn->coseg,2);?></div></td>
         <?php if($obra->tcoseg==2): ?>
           <td><div align="right"><?php echo number_format($arn->coseg + $arn->valor,2);?></div></td>
         <?php endif; ?>
        </tr>
      <?php endif;?> 
    <?php endforeach; ?>     
    </table> 
</div>