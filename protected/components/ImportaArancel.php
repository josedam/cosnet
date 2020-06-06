<?php

class ImportaArancel
{
   public $result = array();

   public function execute()
    {
      set_time_limit(120);
      $nomarnf = Nomarnf::model()->findall();
      if ($nomarnf){
        foreach($nomarnf as $v){
          $model = $this->actualizaObrafarn($v);
          if ($model){
            $this->actualizaPrecioFecha($model);                                   
          }
        }
        Nomarnf::model()->deleteAll();
        Nomarn::model()->deleteAll();
      }  
      set_time_limit(30);
    }

    private function actualizaObrafarn($v)
    {
      Yii::import('ext.ut.utdate',true);
      $model = Obrafarn::model()->findByAttributes(array(
                                        'cos'=>$v->cos,
                                        'fprac'=>rawDate($v->fprac),
                                        ));
                      
      if(!$model){
        $model = new Obrafarn;
        $model->cos  = $v->cos;
        $model->fprac = $v->fprac;
        $model->save();
      }
      return $model;
    }

    private function actualizaPrecioFecha($farn)
    {
      Yii::import('ext.ut.utdate',true);
      $l=0;

      $criteria=new CDbCriteria;
      $criteria->compare('cos',$farn->cos);
      $criteria->compare('fprac',rawDate($farn->fprac));
      $criteria->order = 'cprac';
      
      $model = Nomarn::model()->findAll($criteria);
      foreach($model as $precio){
        $this->actualizaObraprecio($precio, $farn);
        $l++;
      }
      $this->result[] = array($farn->cos.' '.$farn->fprac=>$l);
      return ;
    }
    
    
    private function actualizaObraprecio($precio, $farn)
    {
      
      $model = Obraprecio::model()->findByAttributes(array(
                                        'cos'=>$precio->cos,
                                        'fprac'=>rawDate($precio->fprac), // v->fprac,
                                        'cprac'=>$precio->cprac,
                                        ));
                                        
     if(!$model){
       $model = new Obraprecio;
       $model->cos   = $precio->cos;
       $model->fprac = $precio->fprac;
       $model->cprac = $precio->cprac;
     }                                   
     $model->idobrafarn = $farn->idobrafarn;
     $model->hono   = $precio->hono;
     $model->dere   = $precio->dere;
     $model->coseg  = is_null($precio->coseg)?0:$precio->coseg;
     $model->activo = is_null($precio->activo)?0:$precio->activo;
     
     $model->save();
     
    }    

}
?>
