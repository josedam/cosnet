<?php
/* @var $this SeguroController */

$this->breadcrumbs=array(
	'Certificado',
);
?>

<div class="row">
<div class="span8">
<h3><?php echo $user->nombre.' ('.$user->username.')'; ?></h3>
</div>
<div class="span3">
<?php if(Yii::app()->user->esOperador): ?>
<?php  $this->renderPartial('/liquidacion/_selectprof',array('user'=>$user,'accion'=>'/certificadotr/profesional')); ?>
<?php endif; ?>
</div>
</div>


<?php if($isok): ?>
<div class='span12' style='height:450px;'>

<object data='/<?php echo $archivo ?>#' 
        type='application/pdf' 
        width='100%' 
        height='100%'>

<p>Es posible que su navegador no este configurado para visualizar archivos PDF.
En tal caso, solo <a href='/<?php echo $archivo ?>'>de click aqui para descargarlo.</a></p>

</object>
</div>
<?php else: ?>
<h3>Certificado de tratamiento de Residuos</h3>
<h4>No se registran datos</h4>
<?php endif; ?>