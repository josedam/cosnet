<?php

class DevolucionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','lista','generardatos','profesional','ajaxentregar','detalle'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionAjaxentregar()
    {
        if(isset($_POST['chks'])){
          foreach ($_POST['chks'] as $id){
            $model = $this->loadModel($id);
            if($model){
              $model->marcarEntregado();
            }
          }
        }
    }

	public function actionGenerarDatos(){

		$i=0;
		for ($i=1; $i<=10;$i++){
			$model = new Devolucion;
			$model->idcaptura=$i;
			$model->idregis = 1;
			$model->transac = 1;
			$model->cos = 1149;
			$model->ffac = '01/01/2016';
			$model->csoc = 64;
			$model->npres = 1;
			$model->tipo = 1;
			$model->nlote = 12345670 + $i;
			$model->practicas = '10100, 20100, 20200';
			$model->cant = 1;
			$model->cmotivo = 101;
			$model->paciente = 'Nombre del Paciente juan '.$i;
			$model->obse = 'Observaciones del paciente juan perez que viene a ver que pasa'.$i;
 			$model->save();
		}
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

    public function actionDetalle($id){
    	$model = $this->loadModel($id); //new Devolucion;
    	$this->renderPartial('detalle',array('model'=>$model));
    	Yii::app()->end();
     }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Devolucion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Devolucion']))
		{
			$model->attributes=$_POST['Devolucion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->iddevolucion));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Devolucion']))
		{
			$model->attributes=$_POST['Devolucion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->iddevolucion));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Devolucion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Devolucion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Devolucion']))
			$model->attributes=$_GET['Devolucion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionLista($estado = 1)
    {
      $model = new Devolucion;
      $csoc = Yii::app()->user->getState('csoc');
      $user = User::fromcsoc($csoc);
      $this->render('lista',array('model'=>$model,'csoc'=>$csoc,'user'=>$user, 'estado'=>$estado));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Devolucion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Devolucion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Devolucion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='devolucion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
