<?php

class ImportaLiquidacion
{
  
  public function execute()
  { 
      set_time_limit(0);
      //$this->prueba();
      $this->procesaReci();
      set_time_limit(30);
  }
  
  private function prueba()
  {
    for ($i = 1; $i <= 10; $i++) {
       ServerFlush::enviar('texto','<h1>'.$i.'</h1>');
       sleep(1);
    } 
    ServerFlush::enviar('mensaje','<h1>Terminado...</h1>');
  }
  

  private function procesaReci()
  {
    $model = Lqrecip::model()->findAll();
    if($model){
      foreach($model as $reci){
        $this->status($reci);
        $this->grabaLqReci($reci);
        $this->procesaLqHt($reci);
      }
      Lqrecip::model()->deleteAll();
      Lqmov::model()->deleteAll();
      $this->termina();
    }  else { echo 'SIN MODELO';}
  }

  private function status($reci)
  {
    //ServerFlush::enviar('texto','<h1>'.$reci->csoc.'</h1>');
  }

  private function termina()
  {
    //ServerFlush::enviar('mensaje','Terminado...');
  }


  private function grabaLqReci($reci)
  {
 
    $model=Lqreci::model()->findByAttributes(array(
                                                'csoc'=>$reci->csoc,
                                                'nroliq'=>$reci->nroliq,
                                                 ));
    if(!$model){
      $model = new Lqreci;
      $model->nroliq = $reci->nroliq;
      $model->fliq   = $reci->fliq;
      $model->csoc   = $reci->csoc;
      $model->tcbte  = $reci->tcbte;
      $model->ncbte  = $reci->ncbte;
      $model->coper  = $reci->coper;
      $model->femi   = $reci->femi;
      $model->bruto  = $reci->bruto;
      $model->neto   = $reci->neto;
      
      $model->save();
    }                        
  }
  
  private function procesaLqHt($reci)
  {
    $model=Lqmov::model()->findAllByAttributes(array(
                                                'csoc'=>$reci->csoc,
                                                'nroliq'=>$reci->nroliq,
                                                 ),
                                               array(
                                                 'order'=>'row_id',
                                                 ));
                                                 
    if($model){
      foreach($model as $ht){
        $this->grabaLqHt($ht);
      }
    }
  }

  private function grabaLqHt($ht)
  {
   // $model=Lqht::model()->findAllByAttributes(array(
   //                                             'csoc'=>$ht->csoc,
   //                                             'nroliq'=>$ht->nroliq,
   //                                              ));
   // if(!$model){                                                 
      $model = new Lqht;
      $model->fliq      = $ht->fliq;
      $model->nroliq    = $ht->nroliq;
      $model->csoc      = $ht->csoc;
      $model->creg      = $ht->creg;
      $model->cos       = $ht->cos;
      $model->ffac      = $ht->ffac;
      $model->nfac      = $ht->nfac;
      $model->liq_hon   = $ht->liq_hon;
      $model->liq_gto   = $ht->liq_gto;
      $model->pen_hon   = $ht->pen_hon;
      $model->pen_gto   = $ht->pen_gto;
      $model->aju_debe  = $ht->aju_debe;
      $model->aju_haber = $ht->aju_haber;
      $model->fdesc     = $ht->fdesc;
      $model->cpto      = $ht->cpto;
      $model->tcpt      = $ht->tcpt;
      $model->crub      = $ht->crub;
      $model->debe      = $ht->debe;
      $model->haber     = $ht->haber;
      $model->saldo     = $ht->saldo;
      $model->obse      = $ht->obse;
      $model->lecop     = $ht->lecop;
      $model->ilecop    = $ht->ilecop;
      $model->ipesos    = $ht->ipesos;
      $model->crlecop   = $ht->crlecop;
      $model->p_hon     = $ht->p_hon;
      $model->p_gto     = $ht->p_gto;      
      
      $model->save();  
   // }
    
  }

}
