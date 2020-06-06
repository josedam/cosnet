<?php

class TarjetaController extends Controller
{

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
                'actions'=>array('lista','detalle','referencias'),
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


    public function actionLista()
    {
      $model = new Bhtransf;
      $csoc = Yii::app()->user->getState('csoc');
      $user = User::fromcsoc($csoc);
      $this->render('lista',array('model'=>$model,'csoc'=>$csoc,'user'=>$user));      
  //    $this->render('lista',array('model'=>$model));
    }

    public function actionDetalle($lq,$partial=false)
    {
      $totales = array('bruto'=>0,'tarjeta'=>0,'circulo'=>0,'neto'=>0);
      
      $reci  = $this->loadReci($lq);
      $model = Bhtrans::model()->detalleSocio($lq);
      

      foreach($model as $row){
        $totales['bruto']+=$row->impcupon;
        $totales['tarjeta']+=$row->dctotarj;
        $totales['circulo']+=$row->dctocirc;
        $totales['neto']+=$row->imp;
      }
  //    $totales['neto']= $totales['bruto'] - $totales['tarjeta'] - $totales['circulo'];
      
      if(Yii::app()->request->isAjaxRequest||$partial==true){
        if ($reci) {
          $this->renderPartial('detalle',array('data'=>$model,'reci'=>$reci,'totales'=>$totales));
        } else {
          $this->renderPartial('_blanco');
        }
      } else {
        if ($reci) {
          $this->render('detalle',array('data'=>$model,'reci'=>$reci,'totales'=>$totales));
        } else {
          $this->renderPartial('_blanco');
        }
      }
/*     
      if($model){
        $this->render('detalle',array('data'=>$model,'reci'=>$reci,'totales'=>$totales));
      } else {
        $this->render('error',array('mensaje'=>'No se registran datos para el Detalle de Liquidacion'));
      }*/
    }
    public function loadReci($lq)
    {
      $id=Yii::app()->user->name;
      $csoc = substr($id,2);

      $model = Bhtransf::model()->findByAttributes(array('nroliq'=>$lq));
      return $model;
    }

    public function actionReferencias()
    {
       $model = Empresa::model()->findAll();
       $this->render('cobertura',array('model'=>$model)); 
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
