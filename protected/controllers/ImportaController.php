<?php

class ImportaController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}


    public function actionProducto()
    {
      $oprod = new ImportaProducto;
      $oprod->execute();
      $this->render('totales',array('msg'=>$oprod->mensaje));
    }  
   /*    $leidos = 0;
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
            $prod->precioventa = $reg->contado;
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
       $mensaje = array();
       $mensaje[] = array('Leidos'=>$leidos);
       $mensaje[] = array('Altas'=>$altas);
       $mensaje[] = array('Modific'=>$modi);
       $mensaje[] = array('Grabados'=>$grabados);
       $mensaje[] = array('Errores'=>$errores);
       foreach($sinrubro as $sr){
         $mensaje[] = array('Sin Rubro'=>$sr);
       }
       set_time_limit(30);
       
       $this->render('totales',array('msg'=>$mensaje));
    }
*/

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('producto'),
                'users'=>array('admin'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
