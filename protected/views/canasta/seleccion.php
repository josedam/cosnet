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


      <div class='row'>
        <?php $this->renderPartial('_frmseleprod', array('model'=>$model));?>
      </div>




