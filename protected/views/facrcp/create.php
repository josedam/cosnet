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
<h2>Registro de Recepcion</h2>

<div class='sapn12'>
	<div class='span6'>
		<?php echo $this->renderPartial('_formsocio', array('model'=>$model)); ?>
	</div>

</div>