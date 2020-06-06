<?php

/**
 * This is the model class for table "estado".
 *
 * The followings are the available columns in table 'estado':
 * @property string $idestado
 * @property string $nombre
 */
class Estado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Estado the static model class
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
		return 'estado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idestado', 'required'),
			array('idestado', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idestado, nombre', 'safe', 'on'=>'search'),
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
           'obras' => array(self::HAS_MANY, 'Obra', 'cest'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idestado' => 'Idestado',
			'nombre' => 'Nombre',
		);
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

		$criteria->compare('idestado',$this->idestado,true);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function allData(){
	  $criteria = new CDbCriteria;
	  $criteria->order = 'nombre';
	  return ($this->findAll($criteria));
	}
	
	public function estadoNombre($i=0){
	
	  $r = $this->findByPk($i);
	  if($r){
	    $msg = $r->nombre;
	  } else {
	    $msg = '--------';
	  }
	  return $msg;
	}
	
     public function estadoImagen($e=0){
       switch($e){
         case 1:
           $img='led_verde.ico';
           break;
 
         case 2:
           $img='led_amarillo.ico';
           break;

         case 3:
           $img='led_rojo.ico';
           break;
           
         default:
           $img='led_verde.ico';
       }
       return Yii::app()->request->baseUrl.'/images/'.$img;
     }
 	
}
