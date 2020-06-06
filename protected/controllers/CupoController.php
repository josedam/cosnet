<?php

class CupoController extends Controller
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
                'actions'=>array('index','lista','mesAnterior', 'mesSiguiente','mesActual'),
                'users'=>array('@'),
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
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLista()
	{
		$model = new Odopra('search');
		$model->unsetAttributes();

		$periodo = new CupoPeriodo;
		$csoc = Yii::app()->user->getState('csoc');
		$user = User::fromcsoc($csoc);
		
		$this->render('lista',array('model'=>$model,'csoc'=>$csoc,'user'=>$user, 'periodo'=>$periodo->asText()));      
		// $this->render('lista',array('model'=>$model,'csoc'=>$csoc,'user'=>$user));      
	}
	
	public function actionMesAnterior() {
		$periodo = new CupoPeriodo;
		$periodo->mesAnterior();
		$this->redirect(array('lista'));
	}
	
	public function actionMesSiguiente() {
		$periodo = new CupoPeriodo;
		$periodo->mesSiguiente();
		$this->redirect(array('lista'));
	}
	
	public function actionMesActual() {
		$periodo = new CupoPeriodo;
		$periodo->nuevoPeriodo();
		$this->redirect(array('lista'));
	}


}

