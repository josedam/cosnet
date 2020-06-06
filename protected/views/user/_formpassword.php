<div class='row'>
<div class="span4 offset5">

<h3>Cambiar Contrase&ntilde;a</h3>

  <div class='row'>
  <?php if(Yii::app()->user->hasFlash('notice')):?>
    <div class="alert alert-block">
        <?php echo Yii::app()->user->getFlash('notice'); ?>
    </div>
  <?php endif; ?>
  </div>

<!--  <div class="form"> -->
    <?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array (  
      'id'=>'user-form',
      'enableAjaxValidation'=>false,
        'focus'=>array($model,'password'),
    )); ?>
    <?php // echo $form->errorSummary($model); ?>

    <div class="row">
      <?php echo $form->labelEx($model,'password'); ?>
      <?php echo $form->passwordField($model,'password'); ?>
      <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model,'repeatpassword'); ?>
      <?php echo $form->passwordField($model,'repeatpassword'); ?>
      <?php echo $form->error($model,'repeatpassword'); ?>
    </div>

    <div class="row buttons">
        <?php $this->widget('bootstrap.widgets.BootButton', array(
            'buttonType'=>'submit',
            'type'=>'normal',
            'label'=>'Guardar',
        )); ?>
    </div>
  
    <?php $this->endWidget(); ?>
<!--  </div> --><!-- form -->
</div>
</div>

