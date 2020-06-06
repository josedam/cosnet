<?php
/*
$this->breadcrumbs=array(
	'Empresaitems'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Empresaitem','url'=>array('index')),
	array('label'=>'Administrar Empresaitem','url'=>array('admin')),
);*/
?>
<h1><?php echo CHtml::encode($modelEmpresa->nombre); ?></h1>

<div style="margin-top: 20px;margin-bottom: 20px;margin-left: 30px;">
	
<?php echo $this->renderPartial('//empresa/_view',array('data'=>$modelEmpresa)); ?>
</div>


<h2>Nuevo Item</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>