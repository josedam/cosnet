<?php
  $cs = Yii::app()->getClientScript();
  $cs->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
?>

<div class="row">
  <div class="span8">
    <h3><?php echo $user->nombre.' ('.$user->username.')'; ?></h3>
  </div>

  <div class="span3">
    <?php if(Yii::app()->user->esOperador): ?>
    <?php  $this->renderPartial('/liquidacion/_selectprof',array('user'=>$user,'accion'=>'/cupo/profesional')); ?>
    <?php endif; ?>
  </div>
</div>

<h4>Prestaciones Autorizadas </h4>
<h4>
    <?php  echo CHtml::link('<i class="fa fa-arrow-left"></i>',array('mesAnterior'),
                array('class'=>'btn',
                // 'target'=>'_blank',
                'title'=>'Anterior',
                ));  ?>
    <strong><?php echo $periodo ?></strong>
    <?php  echo CHtml::link('<i class="fa fa-arrow-right"></i>',array('mesSiguiente'),
                array('class'=>'btn',
                // 'target'=>'_blank',
                'title'=>'Siguiente',
                ));  ?>
    <?php  echo CHtml::link('<i class="fa fa-calendar"></i>',array('mesActual'),
                array('class'=>'btn',
                'title'=>'Actual',
                ));  ?>
</h4>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'odopra-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
    array(
			'header'=>'Paciente',
			'type'=>'raw',
			'value'=>'$data->datosPaciente()',
		),
		'faut',
    'nord',
    array(
      'header'=>'Practicas',
      'type'=>'raw',
      'value'=>'$data->datosPracticas()',
    ),
    
    array(
      'header'=>'Importe',
      'type'=>'raw',
      'value'=>'number_format($data->totalOrden(),2)',
    ),
    
		/*
		'idodopra',
		'cos',
		'nafil',
		'gpar',
		'ndoc',
		'csoc',
		'coper',
		'fdia',
		'cest',
		*/
		// array(
		// 	'class'=>'bootstrap.widgets.BootButtonColumn',
		// ),
	),
)); ?>
