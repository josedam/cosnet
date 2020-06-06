<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Nuevo',
);
/*
$this->menu=array(
	array('label'=>'Administrar User','url'=>array('admin')),
); */
?>

<h3>Nuevo Usuario</h3>

<div class='row'>
  <div class='span6 offset3'>
    <?php echo $this->renderPartial('_form', array('model'=>$model,'url'=>$url)); ?>
  </div>
</div>
