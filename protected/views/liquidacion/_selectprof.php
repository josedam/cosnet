<div>
      <?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
        'id'=>'profesional-form',
         'action'=>Yii::app()->createUrl($accion),
         'enableAjaxValidation'=>false,
       //  'htmlOptions'=>array('style'=>'margin:0 0 0 0;'),
       //  'focus'=>array($model,''),
      )); ?>

      <?php echo $form->dropDownList($user,'id', User::htmlOptions() ,
             array('style'=>'width: 320px;','onchange'=>'this.form.submit()')); ?>

      <?php $this->endWidget(); ?>

</div>

