<?php

/**
 * This is the model class for table "odopraitem".
 *
 * The followings are the available columns in table 'odopraitem':
 * @property integer $idodopraitem
 * @property integer $nord
 * @property integer $cprac
 * @property integer $cant
 * @property string $pieza
 * @property string $cara
 * @property integer $cest
 * @property integer $idodopra
 * @property string $impunit
 * @property string $impcoseg
 *
 * The followings are the available model relations:
 * @property Odopra $idodopra0
 */
class Odopraitem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'odopraitem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nord, cprac, idodopra', 'required'),
			array('nord, cprac, cant, cest, idodopra', 'numerical', 'integerOnly'=>true),
			array('pieza', 'length', 'max'=>2),
			array('cara', 'length', 'max'=>5),
			array('impunit, impcoseg', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idodopraitem, nord, cprac, cant, pieza, cara, cest, idodopra, impunit, impcoseg', 'safe', 'on'=>'search'),
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
			'idodopra0' => array(self::BELONGS_TO, 'Odopra', 'idodopra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idodopraitem' => 'Idodopraitem',
			'nord' => 'Nord',
			'cprac' => 'Cprac',
			'cant' => 'Cant',
			'pieza' => 'Pieza',
			'cara' => 'Cara',
			'cest' => 'Cest',
			'idodopra' => 'Idodopra',
			'impunit' => 'Impunit',
			'impcoseg' => 'Impcoseg',
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

		$criteria->compare('idodopraitem',$this->idodopraitem);
		$criteria->compare('nord',$this->nord);
		$criteria->compare('cprac',$this->cprac);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('pieza',$this->pieza,true);
		$criteria->compare('cara',$this->cara,true);
		$criteria->compare('cest',$this->cest);
		$criteria->compare('idodopra',$this->idodopra);
		$criteria->compare('impunit',$this->impunit,true);
		$criteria->compare('impcoseg',$this->impcoseg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Odopraitem the static model class
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
	
	public function importeTotal() {
		return $this->impunit * $this->cant;
	}

}
