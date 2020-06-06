<?php /*
$this->breadcrumbs=array(
	'Rubros'=>array('index'),
	$model->idrubro=>array('view','id'=>$model->idrubro),
	'Actualizar',
);
*/

?>

<h1>Actualizar Rubro <?php echo $model->idrubro; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
