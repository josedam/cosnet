<?php

class CanastaController extends Controller
{

    public $layout='//layouts/column2h';
    
    
    protected function beforeAction($action)
    {
      if($action->id == 'pedido'){
        $oprod = new ImportaProducto;
        $oprod->execute();
      }
      return parent::beforeACtion($action);
    }

	public function actionIndex()
	{
		$this->render('index');
	}
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
                'actions'=>array('pedido','agregar','cancelar','enviar','enviado','seleccion','carrito'),
                'users'=>array('@'),
            ),

            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('ver'),
                'users'=>array('admin'),
            ),


            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionPedido()
    {
        $model=new Producto('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Producto']))
            $model->attributes=$_GET['Producto'];

        $pa= $this->loadPedido(Yii::app()->user->id);
        $pd= new PedidoDetalle;
        $pd->unsetAttributes();
        
        $cant= new CantidadForm;
        
        
        $this->render('pedido',array(
            'model'=>$model,
            'pa'=>$pa,
            'pd'=>$pd,
            'cant'=>$cant,
        ));
    }

    public function actionSeleccion()
    {
        $model=new Producto('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Producto']))
            $model->attributes=$_GET['Producto'];

        $this->render('seleccion',array(
            'model'=>$model,
        ));
    }

    public function actionCarrito()
    {
        $pa= $this->loadPedido(Yii::app()->user->id);
        $pd= new PedidoDetalle;
        $pd->unsetAttributes();
        
        $cant= new CantidadForm;
        
        $this->render('carrito',array(
            'pa'=>$pa,
            'pd'=>$pd,
            'cant'=>$cant,
        ));
    }


    public function actionAgregar($id)
    {
       // $model = new Pedidodetalle;
        $pa = $this->loadPedido(Yii::app()->user->id);
        $model = $this->loadPedidoDetalle($pa->idpedido, $id);
        
        if($model->isNewRecord){
          $prod= $this->loadProducto($id);
          $model->idpedido = $pa->idpedido;
          $model->dataFromProducto($prod);
          $model->cantidad = 1;
        }

        if(isset($_POST['Pedidodetalle']))
        {
            $model->attributes=$_POST['Pedidodetalle'];
            if($model->save())
                $this->redirect(array('/canasta/pedido'));
        }

        $this->render('producto',array(
            'model'=>$model,
        ));
      
    }
/*
    public function actionAgregar($id)
    {
      $pa = $this->loadPedido(Yii::app()->user->id);
      $pd = new Pedidodetalle;
      $pd->idpedido = $pa->idpedido;
      $prod= $this->loadProducto($id);
      $pd->dataFromProducto($prod);
      $pd->cantidad = 1;
      $pd->save();
      
      $this->redirect(array('/canasta/pedido'));
    }
  */  
    public function loadPedidoDetalle($idpedido, $idproducto)
    {
      $model = Pedidodetalle::model()->findByAttributes(
                   array(
                     'idpedido'=>$idpedido,
                     'idproducto'=>$idproducto,
                   ));
      if(!$model){
        $model = new Pedidodetalle;
      }
      return $model;
    }
  
    private function genTextoPedido($pa)
    {
      $txt = $this->renderPartial('_mailpedido',array('pa'=>$pa,'destino'=>'correo'),true,false);

      return $txt; 
    }
    
    public function actionEnviar()
    {
        $model=$this->loadPedido(Yii::app()->user->id);
        if($model->detallecount < 1){
          $this->redirect('pedido');
        }
        $model->scenario='confirma';
        $model->email = $model->user->email;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Pedido']))
        {
            $model->attributes=$_POST['Pedido'];
            $model->confirmaPedido();
            if($model->save()){
                $this->enviarCorreoGMail(
                   array(
                     'email'=>$model->email,
                     'nombre'=>$model->user->nombre,
                   ),
                   $this->genTextoPedido($model)
                 ); 
                $this->redirect(array('enviado','id'=>$model->idpedido));   
             //   $this->render('enviado',array('model'=>$model));
            }
        }

        $this->render('confirma',array(
            'model'=>$model,
        ));    
    
    }
    
    public function actionEnviado($id)
    {
      $model=Pedido::model()->findByPk($id);
      $this->render('enviado',array('model'=>$model));
    }
 /*   
    public function confirmado()
    {  
      $this->enviarCorreoGMail($this->genTextoPedido($pa)); 
    }
  */ 
  
     
    public function enviarCorreoGMail($to=null, $txtHtml='<h1>Solicitud de Materiales</h1>')
    {
       Yii::import('application.extensions.phpmailer.JPhpMailer');
       $mail = new JPhpMailer;
       $mail->IsSMTP(); // telling the class to use SMTP
       // POR LOS ACENTOS
       $mail->CharSet = "UTF-8";  
       $mail->Encoding = "quoted-printable";

      try {
        
       // $mail->SMTPDebug  = 2;                            // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                           // enable SMTP authentication
        $mail->Host       = "ssl://smtp.gmail.com";         // sets the SMTP server
        $mail->Port       = 465;                            // set the SMTP port for the GMAIL server
        $mail->Username   = Yii::app()->params['userMat'];  // SMTP account username
        $mail->Password   = Yii::app()->params['passwMat']; // SMTP account password
        
      //  $mail->AddReplyTo(Yii::app()->params['emailMat'], 'Materiales');
        
        $mail->AddAddress(Yii::app()->params['emailMat'], 'Materiales COS');
        if(!$to==null){
           $mail->AddAddress($to['email'], $to['nombre']);
        }
        
        
        $mail->SetFrom(Yii::app()->params['userMat'], Yii::app()->user->nombre);
        $mail->Subject = Yii::app()->user->name.' '.Yii::app()->user->nombre.' Solicitud de Materiales';
        
        $mail->AltBody = 'Para ver este coreo se requiere un visualizador compatible con HTML!'; // optional - MsgHTML will create an alternate automatically
        
        $mail->MsgHTML($txtHtml);
        
        
        //$mail->AddAttachment('images/chelsea.jpg');      // attachment
        //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
        $mail->Send();
        //echo "Message Sent OK<p></p>\n";
    
      } catch (phpmailerException $e) {
          echo $e->errorMessage(); // Pretty error messages from PHPMailer
    
      } catch (Exception $e) {
          echo $e->getMessage();   // Boring error messages from anything else!

      }
      
      return;
    }
    
    public function loadProducto($id)
    {
      return Producto::model()->findByPk($id);
    }

    public function loadPedido($usr)
    {
      $pa = Pedido::model()->pedidoActivo($usr); //Yii::app()->user->id);
      if(!$pa){
        $pa = new Pedido;
        $pa->nuevoPedido($usr);
        $pa->save();
      }
      return $pa;
    }

    public function actionVer()
    {
    
      $pa = $this->loadPedido(Yii::app()->user->id);
      echo $this->genTextoPedido($pa);

      /*
     $pa = $this->loadPedido(Yii::app()->user->id);
     foreach($pa->detalles as $r){
       echo $r->preciototal;
       echo '<br>';
     }
      echo $pa->detallecount;
      echo '<br/>';
      echo $pa->detallesum;
      echo '<br/>';*/
      Yii::app()->end();
    }

    public function actionCancelar()
    {
      $pa = $this->loadPedido(Yii::app()->user->id);
      $pa->delete();
      $this->redirect(array('/canasta/pedido'));
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
