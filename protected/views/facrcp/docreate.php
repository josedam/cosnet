<?php
$this->breadcrumbs=array(
	'Facrcps'=>array('index'),
	'Nuevo',
);
/*
$this->menu=array(
	array('label'=>'Administrar Facrcp','url'=>array('admin')),
);*/
?>

<h1>Facturacion <?php echo $model->oPeriodo()->AsText(); ?></h1>

<h2><?php echo $model->profesional()->nombre;?> (<?php echo $model->profesional()->username;?>)</h2>

<div class='span12'>
	<div class='span6'>
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	<div style='float:left;'>
		<?php echo $this->renderPartial('_detallesocio', array('model'=>$model)); ?>
	</div>
</div>