<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Nuevo',
);

$this->menu=array(
//	array('label'=>'Listar Empresa','url'=>array('index')),
	array('label'=>'Administrar Empresa','url'=>array('admin')),
);
?>

<h1>Nueva Empresa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>