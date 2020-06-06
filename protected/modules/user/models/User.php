<?php

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
 * @property string $esadmin
 */
class User extends CActiveRecord
{
    public function validatePassword($password)
    {
        return $password===$this->password;
        //return $this->hashPassword($password,$this->salt)===$this->password;
    }
 
    public function hashPassword($password,$salt)
    {
        return md5($salt.$password);
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
			array('username, password, nombre', 'required'),
			array('rol', 'length', 'max'=>10),
			array('username, password, email, salt', 'length', 'max'=>128),
			array('nombre', 'length', 'max'=>40),
			array('email','email'),
			array('esadmin','safe'),
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
   //        'trabajos'  => array(self::HAS_MANY, 'Usertrabajo', 'iduser'),
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
			'password' => 'Clave',
			'email' => 'Email',
			'salt' => 'Salt',
			'rol' => 'Rol',
			'nombre' => 'Nombre',
			'esadmin' => 'Accede al Mapa',
		);
	}

    public function esRoot()
    {
      return strtolower($this->username)=='admin';
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
