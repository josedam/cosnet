
<?php if($destino=='correo'): ?>
<?php $this->renderPartial('_csscorreo'); ?>
<?php endif; ?>

<div class='enviocorreo'>   
<h3>Solicitud de Materiales Odontol&oacute;gicos</h3>

<table>
  <tr>
    <td><div style='width: 150px;'>Profesional</div></td>
    <td><div style='width: 300px;'><b><?php echo $pa->user->nombre.' ('.$pa->user->username.')' ?></b></div></td>
  </tr>
  <?php if($destino=='correo'): ?>
  <tr>
    <td>Numero de Pedido</td>
    <td><b><?php echo $pa->numeropedido ?></b></td>
  </tr>
  <tr>
    <td>Fecha de Envio</td>
    <td><b><?php echo $pa->fechapedido ?></b></td>
  </tr>
  <?php endif; ?>
</table>
<br><br>
<table>
  <tr>
    <td><div style='width:60px;'>Cod.</div></td>
    <td><div style='width:230px;'>Producto</div></td>
    <td><div style='width:60px;'>Cantidad</div></td>
    <td><div style='width:60px;text-align:right;'>P.Unitario</div></td>
    <td><div style='width:60px;text-align:right;'>P.Total</div></td>
  </tr>

  <?php foreach($pa->detalles as $dt):?>
  <tr>
    <td><?php echo $dt->producto->prcod ?></td>
    <td><?php echo $dt->producto->nombre ?></td>
    <td><div style='text-align:center;'><?php echo $dt->cantidad ?></div></td>
    <td><div style='text-align:right;'><?php echo $dt->preciounitario ?></div></td>
    <td><div style='text-align:right;'><?php echo $dt->preciototal ?></div></td>
  </tr>
  <?php if(!empty($dt->observaciones)): ?>
    <tr>
      <td></td>
      <td colspan='3'>
        <i><?php echo CHtml::encode($dt->observaciones); ?></i>
        <br>
      </td>
      <td></td>
    </tr>
  <?php endif; ?>
  <?php endforeach; ?>  
  
  <tr>
    <td colspan=3>&nbsp;</td>
    <td><b>Total</b></td>
    <td><div style='text-align:right;'><b><?php echo $pa->detallesum; ?></b></td>
      
  </tr>             
</table> 
<?php if($destino=='correo'): ?>
<br>
<b>Informacion Adicional</b>
<br>
<table>
  <tr>
    <td><div style='width: 150px;'>eMail</div></td>
    <td><div style='width: 300px;'><b><?php echo $pa->email ?></b></div></td>
  </tr>
  <tr>
    <td><div style='width: 150px;'>Telefonos</div></td>
    <td><div style='width: 300px;'><b><?php echo $pa->telefono ?></b></div></td>
  </tr>
    <tr>
    <td><div style='width: 150px;'>Forma de Pago</div></td>
    <td><div style='width: 300px;'><b><?php echo $pa->formapago->nombre ?></b></div></td>
  </tr>
  <tr>
    <td><div style='width: 150px;'>Forma de Envio</div></td>
    <td><div style='width: 300px;'><b><?php echo $pa->formaenvio->nombre ?></b></div></td>
  </tr>
</table>
<?php endif; ?>

<br>
<?php $this->renderPartial('_terminos'); ?>
</div>

<br>
