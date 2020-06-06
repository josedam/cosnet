

  
  <?php if(empty(Yii::app()->user->model->email)): ?>
  <div class='alert alert-success'>   
    <div style='padding:40px;'>
     <h2>Informaci&oacute;n</h2>
  
     <h4>Por favor complete los datos requeridos en su perfil, ya que &eacute;stos ser&aacute;n 
     utilizados por el sistema como medio de contacto.</h4>
     <br>
     <h4>Muchas Gracias.</h4>
    </div>
  </div> 
   <?php endif; ?>
   
  
   <?php  $this->renderPartial('/home/_coronaviruslink'); ?>

<?php  $this->renderPartial('/home/_obrasonline'); ?>


   

