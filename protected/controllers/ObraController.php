<?php

class ObraController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2h';
	
/*	protected function beforeAction($action)
    {
      if($action->id == 'lista'){
        $oprod = new ImportaObras;
        $oprod->execute();
        $oarn = new ImportaArancel();
        $oarn->execute();
        $onom = new ImportaNomenclador;
        $onom->execute();
      }
      return parent::beforeACtion($action);
    } */

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('norma','lista','detalle','ajaxnorma','ajaxdetalle',
				                 'topdf'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','view'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index'),
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
		$model=new Obra;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Obra']))
		{
			$model->attributes=$_POST['Obra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idobra));
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

		if(isset($_POST['Obra']))
		{
			$model->attributes=$_POST['Obra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idobra));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    public function actionNorma($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Obra']))
        {
            $model->attributes=$_POST['Obra'];
            if($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('norma',array(
            'model'=>$model,
        ));
    }

    public function actionAjaxNorma($id)
    {
        $model=$this->loadModel($id);
        $this->renderPartial('_ajaxnorma',array(
            'model'=>$model,
             ),
             false,false);
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
	 /*
		$dataProvider=new CActiveDataProvider('Obra');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	*/
	  $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Obra('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Obra']))
			$model->attributes=$_GET['Obra'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionLista(){
      $mensaje=Obra::model()->getLista();
      
      if($mensaje) {
        $this->render('lista',array('model'=>$mensaje));
      } else {
        $this->render('error',array('mensaje'=>'No se registran Datos...'));
      }        
    }
/*
    public function actionLista(){
      $mensaje=Obra::model()->getLista();
      
      if($mensaje['RESULT'] == 'OK') {
    //    $this->filtraNormas($mensaje['DATA']);
        $this->render('lista',array('model'=>$mensaje['DATA']));
      } else {
        $this->render('error',array('mensaje'=>$mensaje['MSG']));
      }        
    }
 */   
    private function filtraNormas($msg)
    {
      foreach($msg as $i=>$v){
        $obr = Obra::model()->findByPk($i);
        $v['ArticleId']= is_null($obr)||$obr->normas==''?1:0; 
      }
    }
    
    public function actionDetalle($id=0){
      $mensaje=Obra::model()->getDetalle($id);
      
      if($mensaje['RESULT'] == 'OK') {
        $this->render('detalle',array('model'=>$mensaje['DATA'],'id'=>$id));
      } else {
        $this->render('error',array('mensaje'=>$mensaje['MSG']));
      }        
    }

    public function actionAjaxDetalle($id=0){
      $obra   = $this->loadModel($id);
      $nomen  = $obra->nomenclador;
      $farn   = $obra->selectFecha(date('d/m/Y'));
      
      $this->renderPartial('detalle',array('obra'=>$obra,'nomen'=>$nomen,'farn'=>$farn));

      Yii::app()->end();        
    }

/*
    public function actionAjaxDetalle($id=0){
      $mensaje=Obra::model()->getDetalle($id);
      
      if($mensaje['RESULT'] == 'OK') {
        $this->renderPartial('detalle',array('model'=>$mensaje['DATA'],'id'=>$id));
      } else {
        $this->renderPartial('error',array('mensaje'=>$mensaje['MSG']));
      }
      Yii::app()->end();        
    }
*/
    
    public function actionToPdf($id)
    {
      $obra   = $this->loadModel($id);
      $nomen  = $obra->nomenclador;
      $farn   = $obra->selectFecha(date('d/m/Y'));
      
//      $this->render('detallepdf',array('obra'=>$obra,'nomen'=>$nomen,'farn'=>$farn));
      
      $html = $this->renderPartial('detallepdf',array('obra'=>$obra,'nomen'=>$nomen,'farn'=>$farn),true,false);
      $this->toPdf($html);
   
    }

    /*
    {
      $mensaje=Obra::model()->getDetalle($id);
      if($mensaje['RESULT'] == 'OK') {
        $html=$this->renderPartial('detallepdf',array('model'=>$mensaje['DATA'],'id'=>$id),true,false);
        $this->toPdf($html);
        //echo $html;
        //echo  Yii::app()->theme->getBaseUrl(false);
        //echo '<br>';
        //echo Yii::app()->getBaseUrl(true);
        //Yii::app()->end();
      } else {
        $this->render('error',array('mensaje'=>$mensaje['MSG']));
      }        
    }
    */
    
    private function toPdf($html)
    {
      $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'mm', 'A4', true, 'UTF-8');
      $pdf->SetCreator(PDF_CREATOR);
//      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetMargins(15, 15, 10);
       ob_clean();
      $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);
	  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	//   if (is_callable(array($pdf, 'AliasNbPages'))) {
	// 	$pdf->AliasNbPages();
	// }
      $pdf->AddPage();
      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->lastPage();
      $pdf->Output("aranceles.pdf", "I");
      
    }
   
    
    public function actionVer(){
      echo Obra::model()->getLista();
      Yii::app()->end();
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Obra::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='obra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
