<?php

/**
 * This is the model class for table "bhtransf".
 *
 * The followings are the available columns in table 'bhtransf':
 * @property integer $nroliq
 * @property string $fliq
 * @property double $imp
 * @property integer $cest
 */
class Bhtransf extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bhtransf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroliq, cest', 'numerical', 'integerOnly'=>true),
			array('imp', 'numerical'),
			array('fliq', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroliq, fliq, imp, cest', 'safe', 'on'=>'search'),
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
			'nroliq' => 'Nroliq',
			'fliq' => 'Fliq',
			'imp' => 'Imp',
			'cest' => 'Cest',
		);
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

		$criteria->compare('nroliq',$this->nroliq);
		$criteria->compare('fliq',$this->fliq,true);
		$criteria->compare('imp',$this->imp);
		$criteria->compare('cest',$this->cest);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bhtransf the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
    public function searchSocio($csoc = null)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        //$id=Yii::app()->user->name;
        //$csoc = substr($id,2);
        if (! $csoc) {
        	$csoc = Yii::app()->user->csoc;
        }
        
        $criteria=new CDbCriteria;

        $criteria->compare('csoc',$csoc);
        $criteria->order = 'nroliq desc';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
        
    public function ultimoNroLiq($csoc = null)
    {
    	if (! $csoc) {
        	$csoc = Yii::app()->user->csoc;
        }

      	$criteria=new CDbCriteria;

        $criteria->compare('csoc',$csoc);
        $criteria->order = 'nroliq desc';
        

        $nLiq = 0;
        $dato = Bhtransf::model()->find($criteria);
        if ($dato) {
        	$nLiq =  $dato->nroliq;
        }
        return $nLiq;
    }    

    public static function htmlOptions()
    {
      $criteria = new CDbCriteria;
      $criteria->select = 't.nroliq, t.fliq';
      $criteria->order = 't.fliq';
      $criteria->distinct = true;
      //$criteria->condition = 't.username like "mp%"';
      $model = Bhtransf::model()->findAll($criteria); //array('order'=>'username'));
      return CHtml::listData($model,'nroliq','fliq');
    }

    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }
	
}
