<?php

/**
 * This is the model class for table "nomarnf".
 *
 * The followings are the available columns in table 'nomarnf':
 * @property integer $row_id
 * @property integer $cos
 * @property string $fprac
 */
class Nomarnf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nomarnf the static model class
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
		return 'nomarnf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cos', 'numerical', 'integerOnly'=>true),
			array('fprac', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, cos, fprac', 'safe', 'on'=>'search'),
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
