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
<div class='row'>
    <div class='span8'>
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
                                 'title'=>'Nuevo Pedido',
                               )
                          ); ?>
              <?php echo CHtml::link('<i class="icon-white icon-shopping-cart"></i> Enviar',
                               array('enviar'),
                               array(
                                 'class'=>'btn btn-success ',
                                 'title'=>'Enviar la Solicitud',
                               )
                               ); ?>
                               
          </div>
        </div>
      </div>
    </div> 
    
    <div class='span4'>
      <?php $this->renderPartial('_infoadicional',array('modell'=>$model)); ?>
    </div>
  
</div>


