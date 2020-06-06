
    <div class="container">
      <div class="row">
        <div class="span3">
          <?php echo CHtml::link('<i class="icon-chevron-left"></i> Productos',
                             array('pedido'),
                             array('class'=>'btn','title'=>'Seleccion de Productos')
                             );?>
         
          
    <?php /*      <div class="aside-actu">
            <h6>Categor&iacute;as<span></span></h6>
            <ul>
              <?php foreach(Rubro::model()->lista as $rub): ?>
               <li><?php echo CHtml::link($rub->nombre,'#');?></li>
              <?php endforeach; ?>
            </ul>
          </div>*/ ?>
        </div> 
        
        <div class="span9">
           <div class="row">
              <div class="span4">
                <?php echo CHtml::image(Yii::app()->baseUrl.'/images/producto/300/producto.jpg','Producto',array('title'=>'producto','class'=>'img-polaroid'));?>
              </div>
              
              <div class="span4 offset1">
                <h4 class="titulo"><?php echo $model->producto->nombre;?></h4>
                <hr>
                <p><?php echo $model->producto->nombre;?></p>
                <hr>
          
                <?php $this->renderPartial('_formpedidodetalle',array('model'=>$model));?>
          
              </div>
            </div>
          </div>
        </div>

      </div> <!-- Container -->       
        

