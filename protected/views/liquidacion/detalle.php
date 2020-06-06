<h3><?php echo $user->nombre.' ('.$user->username.')'; ?></h3>

<?php
  $cs = Yii::app()->getClientScript();
  $cs->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
?>
<div class='row offset1'>
<h3>Detalle liquidacion <?php echo $reci->nroliq; ?> <?php echo $reci->fliq ?></h3>
<br>

  <div class='row'>
    <div class='span4'>Obra Social</div>
    <div class='span1'>Factura</div>
    <div class='span1'>Numero</div>
    <div class='span1'>Pendiente</div>
    <div class='span1'>Liquidado</div>
    <div class='span2'>Ajustes</div>
  </div>

<?php foreach($data as $r):?>
<?php if ($r->creg<40):?>
  <div class='row'>
    <div class='span1 centro'><?php echo $r->cos; ?></div>
    <div class='span3'><?php echo $r->obra->nombre; ?></div>
    <div class='span1'><?php echo substr($r->ffac,3,7); ?></div>
    <div class='span1 derecha'><?php echo $r->nfac; ?></div>
    <div class='span1 derecha'><?php echo $r->pend==0?'&nbsp;':number_format($r->pend,2); ?></div>
    <div class='span1 derecha'><?php echo $r->liq==0?'&nbsp;':number_format($r->liq,2); ?></div>
    <div class='span1 derecha'><?php echo $r->aju==0?'&nbsp;':number_format($r->aju,2); ?></div>
    <div class='span1'><?php echo $r->xAjuste; ?></div>
  </div>
<?php endif; ?>
<?php endforeach; ?>

<?php foreach($data as $r):?>
<?php if($r->creg==40):?>
  <div class='row'>
    <div class='span2 offset1'><b>Subtotal Facturacion</b></div>
    <div class='span1 offset3 derecha'><b><?php echo $r->pend==0?'&nbsp;':number_format($r->pend,2); ?></b></div>
    <div class='span1 derecha'><b><?php echo $r->liq==0?'&nbsp;':number_format($r->liq,2); ?></b></div>
    <div class='span1 derecha'><b><?php echo $r->aju==0?'&nbsp;':number_format($r->aju,2); ?></b></div>

  </div>
<?php endif;?>
<?php endforeach; ?>

<br>
<h4>Liquidacion</h4>
  <div class='row'>
    <div class='span4'>Concepto</div>
    <div class='span1'>Fecha</div>
    <div class='span1'>Debe</div>
    <div class='span1'>Haber</div>
    <div class='span1'>Saldo</div>
    <div class='span2'>Observaciones</div>
  </div>

<?php foreach($data as $r):?>
<?php if($r->creg>40&&$r->creg<80&&$r->creg!=64):?>
  <div class='row'>
    <div class='span1 centro'><?php echo $r->cpto; ?></div>
    <div class='span3'><?php echo $r->concepto?$r->concepto->deno:'-----' ?></div>
    <div class='span1'><?php echo $r->fdesc; ?></div>
    <div class='span1 derecha'><?php echo $r->debe==0?'&nbsp;':number_format($r->debe,2); ?></div>
    <div class='span1 derecha'><?php echo $r->haber==0?'&nbsp;':number_format($r->haber,2); ?></div>
    <div class='span1 derecha'><?php echo number_format($r->saldo,2); ?></div>
    <div class='span3 derecha'><?php echo $r->creg==62?'** Cobrado **':$r->obse; ?></div>
  </div>
<?php endif;?>
<?php endforeach; ?>

<?php foreach($data as $r):?>
<?php if($r->creg>=80):?>
  <div class='row'>
    <div class='span3 offset1'><b>Retenciones y Descuentos</b></div>
    <div class='span1 offset1 derecha'><b><?php echo number_format($r->debe,2); ?></b></div>
    <div class='span1 derecha'><b><?php echo number_format($r->haber,2); ?></b></div>
  </div>
  <div class='row'>
    <div class='span3 offset1'><h3><?php echo $r->creg==80?'Neto a Percibir':'Saldo Deudor'; ?></h3></div>
    <div class='span1 offset3 derecha'><h3><?php echo number_format($r->saldo,2); ?></h3></div>
  </div>
  
<?php endif;?> 
<?php endforeach; ?>

</div>
