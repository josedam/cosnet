<?php

class ImportaObras
{
    public function execute()
    {
      $result = false;
      $model=Obras::model()->findAll();
      
      if($model){
        $this->actualizaObras($model);
        Obras::model()->deleteAll();
        $result = true;
      }        
      return $result;
    }

    private function actualizaObras($model)
    {
      foreach($model as $v) {
        $obr = Obra::model()->findByPk($v->cos);
        if (!$obr){
          $obr = new Obra;
          $obr->idobra = $v->cos;
        } 
        $obr->nombre   = $v->apyn;
        $obr->razon    = $v->denom;
        $obr->gerencia = $v->gerencia;
        $obr->cest     = $v->oscest;
        if(!is_null($v->osfest)) $obr->fest = $v->osfest;
        $obr->calle    = $v->calle;
        $obr->barrio   = $v->barri;
        $obr->localidad= $v->local;
        $obr->provincia= $v->prov;
        $obr->cpos     = $v->cpost;
        $obr->email    = $v->email;
        $obr->codnom   = $v->codnom;
        
        $obr->cuit     = $v->cuit;
        $obr->tipofac  = $v->tipofac;
        $obr->porciva  = 0.0;
        $obr->disciva  = 0;
        
        $obr->save();

      }

    }


}

?>
