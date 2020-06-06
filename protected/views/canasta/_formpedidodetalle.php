<script>
function cambiar(can,imp)
{
  var t = can.value * imp;
  t = Math.round(t*100) / 100;
 jQuery('#total').html(number_format(t,2));
 // document.getElementById("total").innerHTML=Date();
}

function number_format(number, decimals, dec_point, thousands_sep) {
    var n = !isFinite(+number) ? 0 : +number, 
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


</script>

    <div class='span2 offset2' style='text-align:right;'>
      <h3><?php echo $model->preciounitario ?></h3>
    </div>
                
    <div class='span4'>            
    <?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	  'id'=>'pedidodetalle-form',
	  'enableAjaxValidation'=>false,
	  'focus'=>array($model,'cantidad'),
    )); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'idpedido'); ?>
	<?php echo $form->hiddenField($model,'idproducto'); ?>
    <?php echo $form->hiddenField($model,'preciounitario'); ?>
    <?php echo $form->hiddenField($model,'preciototal'); ?>

    <div class='row'>
      <div class='span1'>
        <?php echo $form->labelEx($model,'cantidad'); ?>
        <?php echo $form->textField($model,'cantidad',
               array(
                 'maxlength'=>10,
                 'style'=>'width:40px',
                 'onkeyup'=>"cambiar(this,". $model->preciounitario.")",
               )); ?>
      </div>
      <div class='span2 offset1' style='text-align:right;'>
         <h3 id='total'><?php echo $model->preciototal ?></h3>
      </div>
    </div>
    
    <div class='row'>
      <div class='span4'>
      <?php echo $form->labelEx($model,'observaciones');?>

      <?php echo $form->textArea($model,'observaciones',
                   array(
                       'id'=>'editor1',
                       'style'=>'width: 100%; height:100px;',
                   )); ?>   
      </div>
    </div>
	
	<div class="form-actions">
	  <div style='text-align:right'>
         <?php echo CHtml::link('<i class="icon-chevron-left"></i> Productos',
                             array('pedido'),
                             array('class'=>'btn','title'=>'Retornar a la Seleccion de Productos')
                             );?>
	  
	  
		<?php $this->widget('bootstrap.widgets.BootButton',
		   array(
	  	      'buttonType'=>'submit',
			  'type'=>'success',
			  'label'=>'<i class="icon-white icon-shopping-cart"></i> Confirmar',
			  'encodeLabel'=>false,
			  'htmlOptions'=>array(
	             'title'=>'Incorporar a la Solicitud',
	             ),
		   )
		); ?>
		
	
      </div>
	</div>
	</div>

<?php $this->endWidget(); ?>
