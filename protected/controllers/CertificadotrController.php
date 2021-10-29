<?php

class CertificadotrController extends Controller
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
		$nombre_fichero=$this->getNombreCertificado($csoc);
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


	private function getNombreCertificado($csoc)
	{
		$nombre_fichero='data/certificado/';  // Yii::app()->params->segurodir;
		return $nombre_fichero.$csoc.'.pdf';
	}
	
}