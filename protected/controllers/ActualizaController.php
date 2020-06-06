<?php

class ActualizaController extends Controller
{
    public $layout='//layouts/column2';

    public function actionSendMail()
    {
    

     $to = "damasio21@gmail.com";
     $subject = "Hi!";
     $body = "Hi,\n\nHow are you?";
     if (mail($to, $subject, $body)) {
       echo("<p>Message successfully sent!</p>");
      } else {
       echo("<p>Message delivery failed...</p>");
      }
      Yii::app()->end(); 
    }
    
    
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
           /*     'actions'=>array('index','obras','normas','usuarios','claves','SendMail'),*/
                'users'=>array('admin'),
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
	
	public function actionDoAccion($accion='index', $titulo='Accion No definida')
	{
	  $this->render('doaccion',array('accion'=>$accion, 'titulo'=>$titulo));
	}
//////////////////////////////////////////// OBRAS
    public function actionObras()
    {
      $oImporta = new ImportaObras;
      if($oImporta->execute()){
        $this->render('obras');
      } else {
        $this->render('error',array('mensaje'=>'No se Registran Datos en Obras'));
      }        
    }
	
	public function actionObrasCgi()
	{
      $mensaje=Obra::model()->getLista();
      
      if($mensaje['RESULT'] == 'OK') {
        $this->actualizaObrasCgi($mensaje['DATA']);
        $this->render('obras');
      } else {
        $this->render('error',array('mensaje'=>$mensaje['MSG']));
      }        
	}


    private function actualizaObrasCgi($model)
    {
      foreach($model as $a => $v) {
        $obr = Obra::model()->findByPk($a);
        if (!$obr){
          $obr = new Obra;
          $obr->idobra = $a;
        } 
        $obr->nombre = $v['Nombre'];
        $obr->razon  = $v['Denom'];
        $obr->gerencia = $v['Gerencia'];
        $obr->cest   = $v['Estado'];
        $obr->fest   = $v['FEstado'];
        
        $obr->save();

      }
    }      
	
////////////////////////////////////////////////// TBCPTO	
	public function actionTbcpto()
	{
	  foreach(Tbcpto::model()->findAll() as $v){
	    $this->actualizaTbcpto($v);
	  }
	  $this->render('index');
	}
	
	private function actualizaTbcpto($v)
	{
	  $model=Lqcpto::model()->findByPk($v->cpto);
	  if(!$model){
	    $model=new Lqcpto;
	    $model->idlqcpto = $v->cpto;
	  }
	  $model->deno     = $v->deno;
	  $model->crub     = $v->crub;
	  $model->obse     = $v->obse;
	  $model->acm_dgi  = $v->acm_dgi;
	  $model->gen_ddor = $v->gen_ddor;
	  $model->bcond    = $v->bcond;
	  $model->acm      = $v->acm;
	  $model->lecop    = $v->lecop;
	  
	  $model->save();
	}

////////////////////////////////////////////////////// ARANCEL	
	public function actionArancel()
	{
       $oImporta = new ImportaArancel;
       $oImporta->execute();
       $this->render('total',array('l'=>$oImporta->result));
	}


///////////////////////////////////////////////////// NOMENCLADOR
	public function actionNomenclador()
	{
	  $oNom = new ImportaNomenclador;
	  $oNom->execute();
	  $this->render('index');
	}
	

///////////////////////////////////////////////////// NORMAS
	public function actionNormas()
	{
	  $lei=0;
	  $bien=0;
	  $mal=0;
	  $modi=0;
	  $noestan=array();
	  foreach(JosContent::model()->findAll() as $r){
	    $codigo = substr($r->title,0,4);
	    $obr = Obra::model()->findByPk($codigo);
	    $lei++;
	    if($obr){
	      $bien++;
	      $obr->normas = $r->introtext;
	      if($obr->save()){
	        $modi++;
	      }
	    } else {
	      $mal++;
	      $noestan[]=$codigo;
	    }
	  }
	  
	  $m = array('Leidos'=>$lei,
                 'Econtrados'=>$bien,
                 'Modificados'=>$modi,
                 'Errores'=>$mal,
                );

	  $this->render('totales',array('totales'=>$m,'noestan'=>$noestan));
	}

////////////////////////////////////////////////// USUARIOS	
    public function actionUsuarios()
    {
      $lei=0;
      $nuevo=0;
      $mal=0;
      $modi=0;
       $noestan=array();
      foreach(JosUsers::model()->findAll() as $r){
        $usr = User::model()->findByAttributes(array('username'=>$r->username));
        $lei++;
        if($usr){
          $modi++;
        } else {
          $nuevo++;
          $usr = new User;
          $usr->username = $r->username;
        }
        $usr->nombre = $r->name;
        $usr->email  = $r->email;
        $usr->salt   = $r->password;
        $usr->password = $r->username;
        if (!$usr->save()){
          $mal++;
        }
      }
      
      $m = array('Leidos'=>$lei,
                 'Nuevos'=>$nuevo,
                 'Modificados'=>$modi,
                 'Errores'=>$mal,
                );

      $this->render('totales',array('totales'=>$m,'noestan'=>$noestan));
    }


/////////////////////////////////////////////////////// CLAVES    	
    public function actionClaves()
    {
      $lei=0;
      $nuevo=0;
      $mal=0;
      $modi=0;
      $noestan=array();
      set_time_limit(240);
      foreach(User::model()->findAll(array('condition'=>'t.id>328')) as $r){
        $lei++;
        if(strtolower(substr($r->username,0,2))=='mp'){
          $modi++;
          $r->resetSalt();
          if (!$r->save()){
            $mal++;
          }
        }
      }
      set_time_limit(30);
      $m = array('Leidos'=>$lei,
                 'Nuevos'=>$nuevo,
                 'Modificados'=>$modi,
                 'Errores'=>$mal,
                );

      $this->render('totales',array('totales'=>$m,'noestan'=>$noestan));
    }	
	
///////////////////////////////////////////////////// LIQUIDACION
    public function actionLiquidacion()
    {
      $criteria = new CDbCriteria;
      $criteria->select = 'nroliq,fliq';
      $criteria->distinct = true;
      $model = Lqrecip::model()->findAll($criteria);
      if($model) {
        $this->render('liquidacion',array('model'=>$model));
      } else {
        $this->render('sinliquidacion');
      }
    }
    
    public function actionDoliquidacion()   
    {
      $oLiq = new ImportaLiquidacion;
      
      //$this->render('doliquidacion');
      //ServerFlush::flush();

      $oLiq->execute();
      $this->render('index');
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
