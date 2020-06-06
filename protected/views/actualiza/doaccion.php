<?php
/* @var $this ActualizaController */

$this->breadcrumbs=array(
	array('Actualiza'=>'index'),
);

?>
<h1><?php echo $titulo ?></h1>

<div class='row'>
<?php echo CHtml::link(' Comenzar ',array($accion),array('class'=>'btn')); ?>
<?php echo CHtml::link(' Cancelar ',array('index'),array('class'=>'btn btn-danger')); ?>
</div>
