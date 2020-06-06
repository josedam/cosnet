<?php $this->beginWidget('bootstrap.widgets.bootHero', array(
    'heading'=>'',
)); ?>
   
   <h2>Reinicio de Clave</h2>

   <p>Su clave de acceso fue reiniciada con exito Por favor ingrese su nueva clave
   cuando el sistema se lo requiera...</p>

  <?php echo CHtml::link('<i class="icon-user"></i> Continuar',array(Yii::app()->urlBase),array('class'=>'btn btn-normal') ); ?>
 
<?php $this->endWidget(); ?>
