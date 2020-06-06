
<?php $this->beginWidget('bootstrap.widgets.bootHero', array(
    'heading'=>'',
)); ?>
   
   <h2>Circulo Odontologico Santiague&ntilde;o</h2>

   <p>Bienvenidos a la Intra-Net del Circulo Odontologico Santiague&ntilde;o, 
   el centro de informacion de los profesionales de Santiago del Estero.</p>
 
<?php $this->endWidget(); ?>

<?php if(empty(Yii::app()->user->model->email)): ?>
<div class='alert alert-success'>   
  <div style='padding:40px;'>
   <h2>Informaci&oacute;n</h2>

   <h4>Por favor complete los datos requeridos en su perfil, ya que &eacute;stos ser&aacute;n 
   utilizados por el sistema como medio de contacto.</4>
   <br>
   <h4>Muchas Gracias.</h4>
  </div>
</div> 
 <?php endif; ?>
