<?php

/**
 * This is the model class for table "afil".
 *
 * The followings are the available columns in table 'afil':
 * @property integer $idafil
 * @property integer $cos
 * @property integer $nafil
 * @property integer $gpar
 * @property string $apyn
 * @property string $fnac
 * @property integer $ndoc
 * @property string $tdoc
 *
 * The followings are the available model relations:
 * @property Odopra[] $odopras
 */
class Afil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'afil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idafil, apyn', 'required'),
			array('idafil, cos, nafil, gpar, ndoc', 'numerical', 'integerOnly'=>true),
			array('apyn', 'length', 'max'=>50),
			array('tdoc', 'length', 'max'=>3),
			array('fnac', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idafil, cos, nafil, gpar, apyn, fnac, ndoc, tdoc', 'safe', 'on'=>'search'),
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
			'odopra' => array(self::HAS_MANY, 'Odopra', 'idafil'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idafil' => 'Idafil',
			'cos' => 'Cos',
			'nafil' => 'Nafil',
			'gpar' => 'Gpar',
			'apyn' => 'Apyn',
			'fnac' => 'Fnac',
			'ndoc' => 'Ndoc',
			'tdoc' => 'Tdoc',
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

		$criteria->compare('idafil',$this->idafil);
		$criteria->compare('cos',$this->cos);
		$criteria->compare('nafil',$this->nafil);
		$criteria->compare('gpar',$this->gpar);
		$criteria->compare('apyn',$this->apyn,true);
		$criteria->compare('fnac',$this->fnac,true);
		$criteria->compare('ndoc',$this->ndoc);
		$criteria->compare('tdoc',$this->tdoc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Afil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
