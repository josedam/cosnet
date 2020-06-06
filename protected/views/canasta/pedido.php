<h3>Solicitar Materiales</h3>

<?php
//$this->breadcrumbs=array(
//	'Productos'=>array('index'),
//	'Administrar',
//);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('producto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <div class='span10 offset1'> -->

<div class="tab-wrapper tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">1.Seleccione los Productos</a></li>
    <li><a href="#tab2" data-toggle="tab">2.Envienos su Solicitud</a></li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active offset1" id="tab1">
      <div class='row'>
        <?php $this->renderPartial('_frmseleprod', array('model'=>$model));?>
      </div>
    </div> <!-- Tab2 -->
  
  
    <div class="tab-pane  offset1" id="tab2">

      <div class='row'>
        <?php  $this->renderPartial('_frmdetaped', array('model'=>$pd,'pa'=>$pa));?>
      </div>
      <div class='row'>
        <div class="form-actions">
          <div style='float:right;'>
              <?php echo CHtml::link('<i class="icon-trash"></i> Vaciar',
                               array('cancelar'),
                               array(
                                 'class'=>'btn',
                                 'confirm'=>'Desea Eliminar todos los Datos de la solicitud...',
                                 'title'=>'Eliminar el contenido',
                               )
                          ); ?>
              <?php echo CHtml::link('<i class="icon-white icon-shopping-cart"></i> Enviar',
                               array('enviar'),
                               array(
                                 'class'=>'btn btn-primary ',
                                 'title'=>'Enviar la Solicitud',
                               )
                               ); ?>
                               
          </div>
        </div>
      </div>
 
    </div> <!-- Tab1 -->
  
  </div> <!-- Tab content -->
</div> <!-- Tab -->
  



