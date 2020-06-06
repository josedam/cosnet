<?php

class ImportaNomenclador
{
    public function execute()
    {
      set_time_limit(120);
      $model = Nomen::model()->findall();
      if ($model){
        foreach($model as $v){
          $this->actualizaNomenclador($v);
        }
        Nomen::model()->deleteAll();
      }  
      set_time_limit(30);
    }
    
    private function actualizaNomenclador($v)
    {
      $model = Nomenclador::model()->findByAttributes(array(
                                        'ccol'=>$v->ccol,
                                        'cnom'=>$v->cnom,
                                        'cprac'=>$v->cprac));
                                        
     if(!$model){
       $model = new Nomenclador;
       $model->ccol = $v->ccol;
       $model->cnom = $v->cnom;
       $model->cprac= $v->cprac;
     }                                   
     
     $model->deno = $v->deno;
     $model->gal1 = $v->gal1;
     $model->gal2 = $v->gal2;
     $model->gal3 = $v->gal3;
     $model->gto  = $v->gto;
     $model->modanes = $v->mod_anes;
    // $model->tprac   = $v->tprac;
     $model->tunid   = $v->tunid;
     
     $model->save();
     
    }
    
}
?>    
