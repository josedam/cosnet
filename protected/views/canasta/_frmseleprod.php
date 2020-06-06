<?php
/*
   frmseleprod
*/
?>

<div style="font-size: small;">
<?php $this->widget('bootstrap.widgets.BootGridView',array(
    'id'=>'producto-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        
        array(
            'name'=>'idrubro',
            'type'=>'text',
            'value'=>'$data->rubro->nombre',
            'htmlOptions'=>array('style'=>'width: 200px; text-align: left;'),
            'headerHtmlOptions'=>array('style'=>'width: 200px; text-align: left;'),
            'filter' => Rubro::model()->Options, 
        ),
        array(
            'name'=>'nombre',
            'type'=>'raw',
         //   'value'=>'$data->nombre',
            'value'=>'CHtml::link($data->nombre,Yii::app()->createUrl("/canasta/agregar",array("id"=>$data->idproducto)))',            
            'htmlOptions'=>array('style'=>'width: 400px; text-align: left;'),
            'headerHtmlOptions'=>array('style'=>'width: 400px; text-align: left;'),
          //  'filter' => null, 
        ),
        
         array(
            'name'=>'imagen',
            'type'=>'raw',
           // 'value'=>'Yii::app()->baseUrl."/images/producto/140/producto.jpg"',
           // 'value'=>'CHtml::image(Yii::app()->baseUrl."/images/producto/140/producto.jpg")',
           // 'value'=>'CHtml::link("kkk",Yii::app()->createUrl("/canasta/agregar",array("id"=>$data->idproducto)))',
            'value'=>'CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/producto/60/producto.jpg"),Yii::app()->createUrl("/canasta/agregar",array("id"=>$data->idproducto)))',

            'header'=>'',
            'htmlOptions'=>array('style'=>'width: 100px; height:60px; text-align: center;'),
            'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: center;'),
            'filter' => '', 
        ),
        
        
        array(
            'name'=>'precioventa',
            'type'=>'text',
            'value'=>'$data->precioventa',
            'htmlOptions'=>array('style'=>'width: 100px; text-align: right;'),
            'headerHtmlOptions'=>array('style'=>'width: 100px; text-align: right;'),
            'filter' => '', 
        ),

        array(
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'template'=>'{pedir}',
            'header'=>'Acciones',
            'buttons'=>array
             (
                'pedir' => array
                    (
                     'label'=>'Agregar al Pedido',
                     'icon'=>'shopping-cart',
                   //  'imageUrl'=>Yii::app()->request->baseUrl.'/images/carrito.ico',
                     'url'=>'Yii::app()->controller->createUrl("agregar",array("id"=>$data->idproducto))',
                    ),
             )
            
            
        ),
    ),
)); ?>
</div>
