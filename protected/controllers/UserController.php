<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2h';

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('changepassword','update','perfil'),
                'users'=>array('@'),
            ),		
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','admin','delete','resetpassword'),
				'users'=>array('@'),
				'expression'=>'$user->esRoot',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('reiniciarclave', 'doreiniciarclave'),
				'users'=>array('@'),
				'expression'=>'$user->esOperador',
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

    public function actionVer()
    {
       echo Yii::app()->user->esAdmin;
    }


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->create(Yii::app()->createUrl('/user/admin'));
	}
	
    public function create($url)
    {
		$model=new User('create');
        $model->rol = User::ROL_USUARIO;
		$model->esadmin = false;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
		    $frm=Yii::app()->request->getPost('User');
			$model->attributes=$_POST['User'];
			$model->setNewSalt($frm['password']);
           // $model->salt=$model->genNewSalt($frm['password']);
			if($model->save())
				$this->redirect($url);
		}

		$this->render('create',array(
			'model'=>$model,
			'url'=>$url,
		));
	}

	public function actionReiniciarclave()
    {
		$model=new User('consulta');
        //$model->rol = User::ROL_USUARIO;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->username = 'mp'.$model->codigo;
			if ($model->validate()) {
				$model = User::model()->findByAttributes(array('username' => $model->username));
				$this->render('doreiniciar',array('model'=>$model));
				Yii::app()->end();
			}
		}
		$this->render('reiniciar',array('model'=>$model));		
	}

	public function actionDoreiniciarclave()
    {
		$model=new User('consulta');
        //$model->rol = User::ROL_USUARIO;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$msg='';
			if ($model->id>0) {
				$model = $this->loadModel($model->id);
				$this->resetPassword($model->id);
				$msg = 'Clave reiniciada correctamente';
			} else {
				$msg = 'Error. No se pudo actualizar';
			}
			$this->render('_reiniciada',array('model'=>$model,'msg'=>$msg));
			Yii::app()->end();
		}
		$this->render('doreiniciar',array('model'=>$model));
	}


/*	
		    $frm=Yii::app()->request->getPost('User');
		    $model = User::model()->findByAttributes(array('username' => $frm['username']));
		    if ($model) {
		    	$this->render('doreiniciar',array('model'=>$model));
		    } else {
		    	$this->render('reiniciar', array('model' => $model));
		    }

		} else {


			$this->render('reiniciar',array('model'=>$model));
		}
	}
*/
    public function actionPerfil()
    {
 //     Yii::app()->user->setState('rurl',Yii::app()->homeUrl);
      $this->update(Yii::app()->user->id, Yii::app()->homeUrl);      
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	    $this->update($id,Yii::app()->createUrl('/user/admin'));
	    
	/*	$model=$this->loadModel($id);
		$model->scenario = 'update';
		if ($model->rol < 1)
		{
		  $model->rol = User::ROL_USUARIO;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
            $frm=Yii::app()->request->getPost('User');
            $model->attributes=$_POST['User'];
    //        $model->salt=$this->genNewSalt($frm['password']);
			if($model->save()){
			  $this->redirect(array('admin'));
		    }
		}

		$this->render('update',array(
			'model'=>$model,
		));*/
	}
	
    public function update($id, $url)
    {
        $model=$this->loadModel($id);
        $model->scenario = 'update';
        if ($model->rol < 1)
        {
          $model->rol = User::ROL_USUARIO;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            $frm=Yii::app()->request->getPost('User');
            $model->attributes=$_POST['User'];
    //        $model->salt=$this->genNewSalt($frm['password']);
            if($model->save()){
              $this->redirect($url);
            }
        }

        $this->render('update',array(
            'model'=>$model,
            'url'=>$url,
        ));
    }

	
	public function actionChangePassword($id, $url='')
    {
        
        if($id!=Yii::app()->user->id && !Yii::app()->user->esAdmin){
          throw new CHttpException(303,'Acceso denegado...');
        }
        
        $model=$this->loadModel($id);
        $model->scenario='change';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
       

        if(isset($_POST['User']))
        {
            $frm=Yii::app()->request->getPost('User');
            $model->attributes=$_POST['User'];
            $model->setNewSalt($frm['password']);
           // $model->salt=$this->genNewSalt($frm['password']);
            if($model->save()){
                Yii::app()->user->setState('chgpassw',0);
                
                $this->redirect(empty($url)?$this->createUrl('/user/admin'):$url); //$this->createUrl($url));
            }    
        }

        $this->render('password',array(
            'model'=>$model,
            'url'=>$url,
        ));
    }
	
/*	public static function genNewSalt($password)
	{
	  return crypt($password, self::blowfishSalt());
	} */
	
	public function actionResetPassword($id,$url = '/user/admin')
	{
	  $this->resetPassword($id);
      $this->redirect($this->createUrl($url));
	}
	
	public function actionRestore($id,$k)
	{
	  $model = $this->loadModel($id);
	  if($k==md5($model->id)){
	    $this->resetPaswword($id);
	    $this->render('restoreOk',array('model'=>$model));
	  } else {
	    $this->render('restoreError',array('model'=>$model));
	  }
	}
	
	public function resetPassword($id)
	{
      $model=$this->loadmodel($id);
      $model->resetSalt();
      $model->password = $model->username;
      //$model->salt=$model->genNewSalt($model->username);
      $model->save();

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
		$dataProvider=new CActiveDataProvider('User');
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
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
     * Generate a random salt in the crypt(3) standard Blowfish format.
     *
     * @param int $cost Cost parameter from 4 to 31.
     *
     * @throws Exception on invalid cost parameter.
     * @return string A Blowfish hash salt for use in PHP's crypt()
     */
/*    public static function blowfishSalt($cost = 13)
    {
      if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
        throw new Exception("cost parameter must be between 4 and 31");
      }
      $rand = array();
      for ($i = 0; $i < 8; $i += 1) {
        $rand[] = pack('S', mt_rand(0, 0xffff));
      }
      $rand[] = substr(microtime(), 2, 6);
      $rand = sha1(implode('', $rand), true);
      $salt = '$2a$' . sprintf('%02d', $cost) . '$';
      $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
      return $salt;
    }*/
}
