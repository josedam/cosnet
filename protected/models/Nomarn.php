<?php

/**
 * This is the model class for table "nomarn".
 *
 * The followings are the available columns in table 'nomarn':
 * @property integer $row_id
 * @property integer $cos
 * @property string $fprac
 * @property integer $cprac
 * @property integer $scod
 * @property double $hono
 * @property double $dere
 * @property string $activo
 * @property double $coseg
 */
class Nomarn extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nomarn the static model class
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
		return 'nomarn';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cos, cprac, scod', 'numerical', 'integerOnly'=>true),
			array('hono, dere, coseg', 'numerical'),
			array('activo', 'length', 'max'=>1),
			array('fprac', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, cos, fprac, cprac, scod, hono, dere, activo, coseg', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'row_id' => 'Row',
			'cos' => 'Cos',
			'fprac' => 'Fprac',
			'cprac' => 'Cprac',
			'scod' => 'Scod',
			'hono' => 'Hono',
			'dere' => 'Dere',
			'activo' => 'Activo',
			'coseg' => 'Coseg',
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

		$criteria->compare('row_id',$this->row_id);
		$criteria->compare('cos',$this->cos);
		$criteria->compare('fprac',$this->fprac,true);
		$criteria->compare('cprac',$this->cprac);
		$criteria->compare('scod',$this->scod);
		$criteria->compare('hono',$this->hono);
		$criteria->compare('dere',$this->dere);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('coseg',$this->coseg);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }

	
}
