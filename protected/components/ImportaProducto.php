<?php

class ImportaProducto
{
    public $mensaje = array();

    public function execute()
    {
       $leidos = 0;
       $sinrubro = array();
       $altas = 0;
       $modi  = 0;
       $grabados = 0;
       $errores = 0;
       set_time_limit(120);
       
       $mat = Yii::app()->db->createCommand('select * from prcos')->queryAll();// Prcos::model()->findAll(); //array('limit'=>3));
       foreach($mat as $reg)
       {
          $leidos++;
          $prod=Producto::model()->findByAttributes(array('prcod'=>$reg['prcodigo']));
          if(!$prod){
            $prod= new Producto;
            $prod->prcod = $reg['prcodigo'];
          } else {
            $modi++;
          }
          $rub=Rubro::model()->findByPk($reg['prrubro']);
          if(!$rub){
            $sinrubro[] = $reg['prcodigo'].' '.$reg['prnombre'].' ('.$reg['prrubro'].')';
          } else {
            $prod->nombre = $reg['prnombre'];
            $prod->idrubro = $rub->idrubro;
            $prod->cantidad = $reg['prcant'];
            $prod->precioventa = $reg['contado'] ; // * 1.21;
            $prod->activo = 1;
            $prod->publicado = 1;
            if($reg['prcant']==0||$reg['buso']!=0||$reg['contado']==0){
              $prod->alaventa=0;
            } else {
              $prod->alaventa=1;
            }
            if ($prod->save()){
              $grabados++;
            } else {
              $errores++;
            }
          }
       }
       // $mensaje = array();
       $this->mensaje[] = array('Leidos'=>$leidos);
       $this->mensaje[] = array('Altas'=>$altas);
       $this->mensaje[] = array('Modific'=>$modi);
       $this->mensaje[] = array('Grabados'=>$grabados);
       $this->mensaje[] = array('Errores'=>$errores);
       foreach($sinrubro as $sr){
         $this->mensaje[] = array('Sin Rubro'=>$sr);
       }
       Prcos::model()->deleteAll();
       set_time_limit(30);
       
  //     $this->render('totales',array('msg'=>$mensaje));
    }
    
    public function executeold()
    {
       $leidos = 0;
       $sinrubro = array();
       $altas = 0;
       $modi  = 0;
       $grabados = 0;
       $errores = 0;
       set_time_limit(60);
       
       $mat = Prcos::model()->findAll(); //array('limit'=>3));
       foreach($mat as $reg)
       {
          $leidos++;
          $prod=Producto::model()->findByAttributes(array('prcod'=>$reg->prcodigo));
          if(!$prod){
            $prod= new Producto;
            $prod->prcod = $reg->prcodigo;
          } else {
            $modi++;
          }
          $rub=Rubro::model()->findByPk($reg->prrubro);
          if(!$rub){
            $sinrubro[] = $reg->prcodigo.' '.$reg->prnombre.' ('.$reg->prrubro.')';
          } else {
            $prod->nombre = $reg->prnombre;
            $prod->idrubro = $rub->idrubro;
            $prod->cantidad = $reg->prcant;
            $prod->precioventa = $reg->contado * 1.21;
            $prod->activo = 1;
            $prod->publicado = 1;
            if($reg->prcant==0||$reg->buso!=0||$reg->contado==0){
              $prod->alaventa=0;
            } else {
              $prod->alaventa=1;
            }
            if ($prod->save()){
              $grabados++;
            } else {
              $errores++;
            }
          }
       }
       // $mensaje = array();
       $this->mensaje[] = array('Leidos'=>$leidos);
       $this->mensaje[] = array('Altas'=>$altas);
       $this->mensaje[] = array('Modific'=>$modi);
       $this->mensaje[] = array('Grabados'=>$grabados);
       $this->mensaje[] = array('Errores'=>$errores);
       foreach($sinrubro as $sr){
         $this->mensaje[] = array('Sin Rubro'=>$sr);
       }
       Prcos::model()->deleteAll();
       set_time_limit(30);
       
  //     $this->render('totales',array('msg'=>$mensaje));
    }
}
