<?php

//Yii::import('application.extensions.arrayDataProvider.*');

class LiquidacionController extends Controller
{
  	public function actionIndex()
  	{
  		$this->render('index');
  	}


    public function actionProfesional()
    {
        if (isset($_POST['User']['id'])) {
          $user = User::model()->findByPk($_POST['User']['id']);
          if ($user) {
            Yii::app()->user->setState('csoc',$user->matricula);
          }
        }
        $this->redirect(array('lista'));
    }	

    public function actionDetalle($lq)
    {
      $csoc = Yii::app()->user->getState('csoc');
      $user = User::fromcsoc($csoc);
      $reci  = $this->loadReci($lq, $csoc);
      $model = Lqht::model()->detalleSocio($lq,$csoc);
      if($model){
        $this->render('detalle',array('data'=>$model,'reci'=>$reci,'user'=>$user));
      } else {
        $this->render('error',array('mensaje'=>'No se registran datos para el Detalle de Liquidacion'));
      }
    }
      
 /*     $id=Yii::app()->user->name;
      $mensaje=$this->getDetalle($id, $lq);
      
      if($mensaje['RESULT'] == 'OK') {
        $this->render('detalle',array('data'=>$mensaje['DATA']));
      } else {
        $this->render('error',array('mensaje'=>$mensaje['MSG']));
      }          
    }	 */
	
	public function loadReci($lq, $csoc)
	{
//      $id=Yii::app()->user->name;
//      $csoc = substr($id,2);

	  $model = Lqreci::model()->findByAttributes(array('csoc'=>$csoc,'nroliq'=>$lq));
	  return $model;
	}
	
    public function actionLista()
    {
      $model = new Lqreci;
      $csoc = Yii::app()->user->getState('csoc');
      $user = User::fromcsoc($csoc);
      $this->render('lista',array('model'=>$model,'csoc'=>$csoc,'user'=>$user));
    }
    
 /*   
      $dataProvider = new CArrayDataProvider($mensaje['DATA'],array('keyField'=>false,));
      $this->render('lista',array('model'=>$mensaje['DATA'], 'dataProvider'=>$dataProvider));

      } else {
        $this->render('error',array('mensaje'=>$mensaje['MSG']));
      }        
    }
*/

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            array('ext.filters.EChangePasswordFilter'),            
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
                'actions'=>array('lista','detalle'),
                'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','view','create','update','admin','delete'),
                'users'=>array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('profesional'),
                'users'=>array('@'),
                'expression'=>'$user->esOperador',
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

     public function getLista($id)
     {
       $csoc = substr($id,2);
       $model = Lqreci::datosSocio($csoc);
       return $model;
     }  

    
     public function getListaCGI($id){
       $url = $this->urlBase()."/cgi-bin/reciboscgi.cgi?task=list&id=".$id;
       try {
         $variable = file_get_contents($url);
         $mensaje = json_decode($variable,true); // Decodifica como Array Asociado (true) y no como Objeto

       } catch (Exception $e) {
         $mensaje=$this->mensajeError($e->getMessage());
       }

       return $mensaje; 
     }
 
     // http://www.cosantiago.com.ar/cgi-bin/reciboscgi.cgi?task=detalle&id=mp64&nroliq=296
     public function getDetalle($id, $lq){
       $url = $this->urlBase()."/cgi-bin/reciboscgi.cgi?task=detalle&id=".$id.'&nroliq='.$lq;
       try {
         $variable = file_get_contents($url);
         $mensaje = json_decode($variable,true); // Decodifica como Array Asociado (true) y no como Objeto

       } catch (Exception $e) {
         $mensaje=$this->mensajeError($e->getMessage());
       }

       return $mensaje; 
     }

 
     private function urlBase(){
      // $baseurl=Yii::app()->request->baseUrl;
       $baseurl=Yii::app()->params->urlcgi; //'http://www.cosantiago.com.ar';
      return $baseurl;
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
