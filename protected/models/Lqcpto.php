<?php

/**
 * This is the model class for table "lqcpto".
 *
 * The followings are the available columns in table 'lqcpto':
 * @property integer $idlqcpto
 * @property string $deno
 * @property integer $crub
 * @property string $obse
 * @property string $acm_dgi
 * @property string $gen_ddor
 * @property string $bcond
 * @property string $acm
 * @property double $lecop
 */
class Lqcpto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lqcpto the static model class
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
		return 'lqcpto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('crub', 'numerical', 'integerOnly'=>true),
			array('lecop', 'numerical'),
			array('deno, obse', 'length', 'max'=>30),
			array('acm_dgi, gen_ddor', 'length', 'max'=>1),
			array('bcond', 'length', 'max'=>120),
			array('acm', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlqcpto, deno, crub, obse, acm_dgi, gen_ddor, bcond, acm, lecop', 'safe', 'on'=>'search'),
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
			'idlqcpto' => 'Concepto',
			'deno' => 'Denominacion',
			'crub' => 'C.Rubro',
			'obse' => 'Observaciones',
			'acm_dgi' => 'Acumula Dgi',
			'gen_ddor' => 'Genera Deudor',
			'bcond' => 'Bloque Condicion',
			'acm' => 'Acumulador',
			'lecop' => 'Lecop',
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

		$criteria->compare('idlqcpto',$this->idlqcpto);
		$criteria->compare('deno',$this->deno,true);
		// $criteria->compare('crub',$this->crub);
		// $criteria->compare('obse',$this->obse,true);
		// $criteria->compare('acm_dgi',$this->acm_dgi,true);
		// $criteria->compare('gen_ddor',$this->gen_ddor,true);
		// $criteria->compare('bcond',$this->bcond,true);
		// $criteria->compare('acm',$this->acm,true);
		// $criteria->compare('lecop',$this->lecop);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
		));
	}
}