<div>
    <!-- <?php $this->beginWidget('bootstrap.widgets.bootHero', array(
            'heading'=>'Coronavirus: IOSEP/Hamburgo Sin Auditoria Previa',
            )); ?> -->
            
        <?php  $this->renderPartial('/home/_coronavirus'); ?>
        <!-- <?php $this->endWidget(); ?>     -->


  </div>

<style>
 .grande {
    top: 10%;
    left: 50%;
    z-index: 1050;
    width: 560px;
    margin-left: -280px;        
    }
</style>

<?php  Yii::app()->clientScript->registerScript('esperar','

var t=0;
var tmr;
function espera()
{
 $("#static_mesage").modal(); 
 tmr=setInterval("espera_timer()",1200);
 setTimeout("clearInterval("+tmr+")",122000);
 return true;
}

function mostrar()
{
 $("#static_mesage").modal(); 
 return true;
}

function espera_timer()
{
  t++;
  $("#espera_bar").width(t+"%");
  return true;
}

', CClientScript::POS_HEAD);  ?> 

