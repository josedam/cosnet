<?php

/**
 * This is the model class for table "obraprecio".
 *
 * The followings are the available columns in table 'obraprecio':
 * @property string $idobraprecio
 * @property string $cos
 * @property string $fprac
 * @property string $cprac
 * @property double $hono
 * @property double $dere
 * @property integer $activo
 * @property double $coseg
 */
class Obraprecio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Obraprecio the static model class
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
		return 'obraprecio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activo', 'numerical', 'integerOnly'=>true),
			array('hono, dere, coseg', 'numerical'),
			array('cos, cprac', 'length', 'max'=>10),
			array('fprac', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idobraprecio, cos, fprac, cprac, hono, dere, activo, coseg', 'safe', 'on'=>'search'),
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
			'idobraprecio' => 'Idobraprecio',
			'cos' => 'Cos',
			'fprac' => 'Fprac',
			'cprac' => 'Cprac',
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

		$criteria->compare('idobraprecio',$this->idobraprecio,true);
		$criteria->compare('cos',$this->cos,true);
		$criteria->compare('fprac',$this->fprac,true);
		$criteria->compare('cprac',$this->cprac,true);
		$criteria->compare('hono',$this->hono);
		$criteria->compare('dere',$this->dere);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('coseg',$this->coseg);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function arancelPractica($cos, $cprac, $fprac)
    {
      Yii::import('ext.ut.utdate',true);
      
      $criteria = new CDbCriteria;
      $criteria->compare('cos',$cos);
      $criteria->compare('cprac',$cprac);
      $fp = rawDate($fprac); //date("Y-d-m",strtotime($fprac));
 //     $criteria->compare('fprac',$fp);
 //     $criteria->compare('fprac',$fp,false,'<=');
 //     $criteria->addCondition('fprac <='.$fp);
  
      $criteria->order = 'fprac desc';
 //     $criteria->limit = 1;
      

      $models = $this->model()->findAll($criteria);
      if(!$models) {
        $model = new Obraprecio;
      } else {
        foreach($models as $model){
          if(rawDate($model->fprac) <= $fp){
            break;
          } 
        }
      }
      
      return $model;
    }
    
    public function getValor()
    {
      return $this->hono + $this->dere;
    }
    
    public function getNomenclador()  // relacion con Nomenclador
    {
      $model = Nomenclador::model()->findByAttributes(array(
                                      'ccol'=>2,
                                      'cnom'=>$this->cos,
                                      'cprac'=>$this->cprac,
                                      ));
                                      
      if (!$model) $model = new Nomenclador;                                
      
      return $model;                                      
    }
    
    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }

	
	
}
