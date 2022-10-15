<?php

class SeguroAnexoController extends Controller
{
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
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index'),
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

	public function actionIndex()
	{
		
		$csoc = Yii::app()->user->getState('csoc');
		$user = User::fromcsoc($csoc);
		$nombre_fichero=$this->getNombrePoliza($csoc);
		$this->render('index',array(
			'isok'=>file_exists($nombre_fichero),
			'archivo'=>$nombre_fichero,
			'user'=>$user));	
	}
	
	public function actionProfesional()
    {
        if (isset($_POST['User']['id'])) {
          $user = User::model()->findByPk($_POST['User']['id']);
          if ($user) {
            Yii::app()->user->setState('csoc',$user->matricula);
          }
        }
        $this->redirect(array('index'));
    }	


	private function getNombrePoliza($csoc)
	{
		$nombre_fichero='data/seguro/';  // Yii::app()->params->segurodir;
		return $nombre_fichero.$csoc.'A.pdf';
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