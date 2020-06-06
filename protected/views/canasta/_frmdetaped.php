
<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'pedidodetalle-grid',
	'dataProvider'=>$model->search($pa->idpedido),
	'filter'=>null,
	'enableSorting'=>false,
    'template' => '{items} {pager}',
	
	
	'columns'=>array(
	    array(
	      'name'=>'idproducto',
	      'value'=>'CHtml::link($data->producto->nombre,Yii::app()->controller->createUrl("/canasta/agregar",array("id"=>$data->idproducto)))',
          'htmlOptions'=>array('style'=>'width: 300px; text-align: left;'),
          'headerHtmlOptions'=>array('style'=>'width: 300px; text-align: left;'),
          'type'=>'raw',
	      
	    ),
	    
	    array(
	      'name'=>'cantidad',
          'htmlOptions'=>array('style'=>'width: 70px; text-align: right;'),
          'headerHtmlOptions'=>array('style'=>'width: 70px; text-align: center; '),
	    ),

        array(
          'name'=>'preciounitario',
          'htmlOptions'=>array('style'=>'width: 100px; text-align: right;'),
          'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
          'footer'=>'Total',
          'footerHtmlOptions'=>array('style'=>'width: 100px; text-align: right;font-weight:bold;'),
        ),

        array(
          'name'=>'preciototal',
          'htmlOptions'=>array('style'=>'width: 100px; text-align: right;'),
          'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
          'footer'=>$pa->detallesum,
          'footerHtmlOptions'=>array('style'=>'width: 100px; text-align: right;font-weight:bold;'),
        ),

		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
            'template'=>'{delete} {modificar}',
            'buttons'=>array
             (
                'delete' => array
                    (
                     'label'=>'Eliminar del Pedido',
                     'url'=>'Yii::app()->controller->createUrl("/pedidodetalle/delete",array("id"=>$data->idpedidodetalle))',
                     'icon'=>'remove',
                    ),
                    
                'modificar' => array
                    (
                      'label'=>'Mostrar producto',
                      'url'=>'Yii::app()->controller->createUrl("/canasta/agregar",array("id"=>$data->idproducto))',
                      'icon'=>'edit',
                    )
             )
			
		),
	),
)); ?>
