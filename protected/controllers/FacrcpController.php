<?php

class FacrcpController extends Controller
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
				'actions'=>array('create','update','docreate','imprimir','admin','autocomplete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new Facrcp;
		$modelPeriodo = Facperiodo::getPeriodoActivo();

		$model->periodo = $modelPeriodo->periodo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Facrcp']))
		{
			$model->attributes=$_POST['Facrcp'];

			if ($model->validate()) {
				$this->render('docreate', array('model'=>$model));
				Yii::app()->end();
			}

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionDoCreate()
	{
		$model=new Facrcp;
		$modelPeriodo = Facperiodo::getPeriodoActivo();

		$model->periodo = $modelPeriodo->periodo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Facrcp']))
		{
			$model->attributes=$_POST['Facrcp'];

			if($model->save())
				$this->imprimirModelo($model);
				Yii::app()->end();
			//	$this->redirect(array('create')); //,'id'=>$model->id));
		}

		$this->render('docreate',array(
			'model'=>$model,
		));
	}


	public function actionAutocomplete($term) 
	{
	 $criteria = new CDbCriteria;
	 $criteria->condition = 'csoc > 0  and (LOWER(username) = :term2  or LOWER(nombre) like :term )';
	 $criteria->params = array(':term' => '%'.strtolower($_GET['term']).'%',':term2' => 'mp'.strtolower($_GET['term']));

//	 $criteria->compare('LOWER(username)', strtolower($_GET['term']), true);
//	 $criteria->compare('LOWER(nombre)', strtolower($_GET['term']), true, 'OR');
	 $criteria->order = 'nombre';
	 $criteria->limit = 7; 
	 $data = User::model()->findAll($criteria);

	 if (!empty($data))
	 {
	  $arr = array();
	  foreach ($data as $item) {
	   $arr[] = array(
	    'id' => $item->id,
	    'csoc' => $item->csoc,
	    'label' => $item->nombre.' ('.$item->username.')',
	   );
	  }
	 }
	 else
	 {
	  $arr = array();
	  $arr[] = array(
	   'id' => '',
	   'csoc' => 'No se han encontrado resultados para su búsqueda',
	   'label' => 'No se han encontrado resultados para su búsqueda',
	  );
	 }
	  
	 echo CJSON::encode($arr);
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

		if(isset($_POST['Facrcp']))
		{
			$model->attributes=$_POST['Facrcp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Facrcp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Facrcp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Facrcp']))
			$model->attributes=$_GET['Facrcp'];

		$this->render('admin',array(
			'model'=>$model,
			'modelPeriodo'=>Facperiodo::getPeriodoActivo(),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Facrcp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionImprimir($id)
	{
		$model = $this->loadModel($id);
		$this->imprimirModelo($model);
	}

	public function imprimirModelo($model)
	{

		$name = $this->nombreRotulo(); //'rotulos.pdf';
		$pdf = new rotuloPdf();
		$pdf->imprimirComprobante($model,'F',$name);
		$this->render('_verpdf', array('name'=>$name));
	}

	private function nombreRotulo()
	{
		$nombreCookie = 'NombreRotulo';
		$nombreArchivo = 'Rotulos.pdf';
		if (Cookie::hasCookie($nombreCookie)) {
			$nombreArchivo = Cookie::getCookie($nombreCookie);
		} else {
			$nombreArchivo = 'temp/Rotulo'.uniqid('s_',false).'.pdf';
			Cookie::setCookie($nombreCookie, $nombreArchivo, Cookie::Lifetime);
		}
		return $nombreArchivo;
	}
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='facrcp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
