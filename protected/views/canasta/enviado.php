
<?php $this->beginWidget('bootstrap.widgets.bootHero', array(
    'heading'=>'',
)); ?>
   
   <h3>Solicitud de Materiales Enviada</h3>

  <p>La solicitud de materiales Numero <b><?php echo $model->numeropedido ?></b> fue enviada
  correctamente.<p>
  <p>Adicionalmente se remitió una copia de la misma a <i><?php echo $model->email ?></i>.</p>
 <br>
 <i>Muchas Gracias</i>
<?php $this->endWidget(); ?>
