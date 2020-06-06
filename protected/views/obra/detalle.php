<div >
  <div  >
    <div  style='margin-left:0px;'>
      <h3><?php echo $obra->nombre; ?></h3>
    </div>
    <div  style='margin-left:0px; margin-bottom:10px;'>
      <?php if($obra->razon): ?>
        <i><?php echo $obra->razon; ?></i><br>
      <?php endif; ?>    
      <?php if($obra->gerencia): ?>
        Gerenciada por <i><?php echo $obra->gerencia ?></i><br>
      <?php endif; ?>  
    </div>

    <?php 
    $fa = $farn->fprac;
    ?>
  </div>
  
  <div class="tabbable" > <!-- Only required for left/right tabs -->
    <ul class="nav nav-pills">
      <li class="active"><a href="#tab1" data-toggle="tab"> Arancel Vigente </a></li>
      <li><a href="#tab2" data-toggle="tab"> Normas de Trabajo </a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab1">

      <div >
        <div  >
          <div class="text-left span6" style="margin-left:0px;">
          <h4>Fecha de Arancel <?php echo $fa ?> </h4> 
          </div>
          <div class='text-right span2' style="margin-left:0px;">

              <?php  echo CHtml::link('<i class="icon-print"></i>',array('toPdf','id'=>$obra->idobra),
                array('class'=>'btn',
                'target'=>'_blank',
                'title'=>'Imprimir',
                ));  ?>

          </div>
        </div>

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

      </div>
      <div class="tab-pane" id="tab2">

<?php

$postdata = http_build_query(
  array(
      'id' => $obra->idnorma
  )
);

$opts = array('http' =>
  array(
      'method'  => 'POST',
      'header'  => 'Content-Type: application/x-www-form-urlencoded',
      'content' => $postdata
  )
);

$context  = stream_context_create($opts);
try {
  $result = file_get_contents('https://cosantiago.com.ar/normas-trabajo-backend/get_normas.php', false, $context);
  // $result = CHtml::encode($result);  

  // $fichero = 'd:\kk\gente.txt';
  // file_put_contents($fichero, $result);

  $letras  = array(chr(0xE1),chr(0xE9),chr(0xED),chr(0xF3),chr(0xFA),chr(0xD1),chr(0xF1),chr(0x96),chr(0xA0),chr(0xD8),chr(0xDA));
  $codigos = array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&Ntilde;","&ntilde;", "-","", " ","&Uacute;");
  $result  = str_replace($letras, $codigos, $result);

  echo  $result ;
  echo $obra->idnorma;   
 

} catch (Exception $e) {
  $result = 'Error - ';
}

?>
      </div>
    </div>
  </div>

</div>
