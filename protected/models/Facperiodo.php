<?php

/**
 * This is the model class for table "facperiodo".
 *
 * The followings are the available columns in table 'facperiodo':
 * @property string $periodo
 * @property integer $activo
 */
class Facperiodo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facperiodo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periodo', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('periodo', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('periodo, activo', 'safe', 'on'=>'search'),
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
			'periodo' => 'Periodo',
			'activo' => 'Activo',
		);
	}

	public static function getPeriodoActivo()
	{
		$model=Facperiodo::model()->findByAttributes(array('activo'=>1));
		if($model===null)
			throw new CHttpException(404,'No existe ningun periodo Activo.');
		return $model;		
	}

	public function activar()
	{
		$this->activo = 1;
		$this->save();
	}

	public function desactivar()
	{
		$this->activo = 0;
		$this->save();
	}

	public function oPeriodo()
	{
		$periodo = new tPeriodo($this->periodo);
		return $periodo;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('periodo',$this->periodo,true);
		$criteria->compare('activo',$this->activo);
		$criteria->order = 'periodo desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facperiodo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }	
}
