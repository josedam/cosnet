<?php

/**
 * This is the model class for table "rubro".
 *
 * The followings are the available columns in table 'rubro':
 * @property string $idrubro
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 */
class Rubro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rubro the static model class
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
		return 'rubro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>50),
			array('nombre,idrubro','required'),
			array('idrubro','numerical','integerOnly'=>true,'min'=>1),
			array('idrubro','unique','className'=>'rubro','message'=>'El Codigo es existente.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nombre', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Producto', 'idrubro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrubro' => 'Codigo',
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

		$criteria->compare('idrubro',$this->idrubro,true);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLista()
	{
	  return $this->findAll(array('order'=>'nombre'));
	}
	
	public function getOptions()
	{
	  $criteria = new CDbCriteria;
	  $criteria->order= 'nombre';
      $criteria->compare('alaventa',1);
	  
	  return CHtml::listData($this->findAll($criteria),'idrubro','nombre');
	}
    
    public function getAllOptions()
    {
      $criteria = new CDbCriteria;
      $criteria->order= 'nombre';
      
      return CHtml::listData($this->findAll($criteria),'idrubro','nombre');
    }	
	
}
