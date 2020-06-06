<?php if ( ! defined('YII_PATH')) exit('No direct script access allowed');

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $salt
 * @property string $rol
 * @property string $nombre
 * @property integer $esadmin
 */
class User extends CActiveRecord
{
    const ROL_SUPERUSUARIO = 99;
    const ROL_ADMINISTRADOR = 80;
    const ROL_OPERADOR = 60;
    const ROL_USUARIO = 40;
    
    public $repeatpassword ;
    public $codigo;

    public function validatePassword($password)
    {
        return $password===$this->password;
       // return $this->hashPassword($password,$this->salt)===$this->salt; //password;
    }
 
    public function hashPassword($password,$salt)
    {
        //return md5($salt.$password);
        return crypt($password, $salt);
        
    } 
    
    public function resetSalt()
    {
      $this->salt = $this->genNewSalt($this->username);
    }

    
    public function setNewSalt($password)
    {
      $this->salt = $this->genNewSalt($password);
    }
    
    public static function genNewSalt($password)
    {
      return crypt($password, self::blowfishSalt());
    }
    /**
     * Generate a random salt in the crypt(3) standard Blowfish format.
     *
     * @param int $cost Cost parameter from 4 to 31.
     *
     * @throws Exception on invalid cost parameter.
     * @return string A Blowfish hash salt for use in PHP's crypt()
     */
    public static function blowfishSalt($cost = 13)
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
    }
    
    public static function htmlOptions()
    {
      $criteria = new CDbCriteria;
      $criteria->order = 'csoc'; //substr(username,3)';
      $criteria->condition = 't.username like "mp%"';
      $model = User::model()->findAll($criteria); //array('order'=>'username'));
      return CHtml::listData($model,'id','nombreCompleto');
    }

    public static function htmlOptions2()
    {
      $criteria = new CDbCriteria;
      $criteria->order = 'csoc'; //substr(username,3)';
      $criteria->condition = 't.username like "mp%"';
      $model = User::model()->findAll($criteria); //array('order'=>'username'));
      return CHtml::listData($model,'id','nombreCompleto2');
    }

    public function getNombreCompleto()
    {
      return $this->username.' - '.$this->nombre;
    }

    public function getNombreCompleto2()
    {
      return $this->csoc.' - '.$this->nombre;
    }

   public static function fromcsoc($csoc=0) 
   {
      $clave = 'MP'.$csoc;
      $model = User::model()->findByAttributes(array('username'=>$clave));
      if (!$model) {
        $model = new User;
      }
      return $model;
   }

   public function getMatricula()
   {
      return is_numeric(substr($this->username,2))?substr($this->username,2)*1:0;
   }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('rol', 'length', 'max'=>10),
			array('username, password, email, salt', 'length', 'max'=>128),
			array('repeatpassword', 'length', 'max'=>128),
			array('nombre', 'length', 'max'=>40),
			array('username','unique','className'=>'User','on'=>'create,update'),
			array('email','email','message'=>'La direccion de correo no es valida'),
			array('esadmin','safe'),
      array('nombre', 'required','on'=>'create,update,change'),

      array('password', 'required','on'=>'create,change'),

      array('password','compare',
          'compareAttribute'=>'username',
          'operator'=>'!=',
          'message'=>'La contrase�a indicara no es segura. Cambiela.',
          'on'=>'create,change',
      ),

			array('repeatpassword','compare',
			    'compareAttribute'=>'password',
			    'message'=>'La repeticion de la clave no coincide...',
			    'on'=>'create,change',
			),
      
      array('nombre,username,id'  ,'safe' ,'on'=>'consulta'),
      array('username','exist','on'=>'consulta','message'=>'Usuario no registrado'),
      array('codigo','numerical',
              'integerOnly'=>true,
              'max'=>9999,
              'min'=>0,
              'tooBig'=>'Matricula Valor Incorrecto',
              'tooSmall'=>'Matricula Valor Incorrecto',
              'allowEmpty'=>true,
              'on'=>'consulta',
        ),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, nombre, email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
   //        'provincia' => array(self::BELONGS_TO, 'Provincia'),
           'pedidos'  => array(self::HAS_MANY, 'Pedido', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Usuario',
			'password' => 'Contrase&ntilde;a',
			'email' => 'Email',
			'salt' => 'Salt',
			'rol' => 'Rol',
			'nombre' => 'Nombre',
			'esadmin' => 'Administrador',
			'repeatpassword'=>'Repetir Contrase&ntilde;a',
      'codigo'=>'Matricula',
		);
	}

    public static function listaRoles()
    {
      $r=array(
         User::ROL_USUARIO=>'Usuario',
         User::ROL_OPERADOR=>'Operador',
         User::ROL_ADMINISTRADOR=>'Administrador',
         User::ROL_SUPERUSUARIO=>'Super Usuario',
         );
       return $r;
    }
    
    public function rolName()
    {
      $s='';
      $r=User::listaRoles();
      if(isset($r[$this->rol])) {
        $s= $r[$this->rol];
      }
      return $s;
    }
    
   
    public function esRoot()
    {
      return $this->rol == User::ROL_SUPERUSUARIO; // strtolower($this->username)=='admin';
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

	//	$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nombre',$this->nombre,true);
	//	$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
	//	$criteria->compare('salt',$this->salt,true);
	//	$criteria->compare('rol',$this->rol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function setReturnPage($url)
	{
	   Yii::app()->user->setState('userretpg',$url);
	}

    public static function getReturnPage()
    {
      $url=Yii::app()->user->getState('userretpg');
      if(!isset($url)||empty($usr)){
        $url=Yii::app()->homeUrl;
        Yii::app()->user->setState('userretpg','');
      }
      return $url;
    }

    public function beforeSave()
    {
      if (substr($this->username,0,2)=='mp') {
        $this->csoc = substr($this->username,2);
      }

      return parent::beforeSave();
    }

/*	
     public function behaviors()
    {
      
      return array(	
	          'AttributesBackupBehavior' => array(
                'class' => 'ext.AttributesBackupBehavior',
                'reloadAfterSave' => false,
               ),
             );
    } */        
}
