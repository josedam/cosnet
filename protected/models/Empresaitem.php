<?php

/**
 * This is the model class for table "empresaitem".
 *
 * The followings are the available columns in table 'empresaitem':
 * @property integer $idempresaitem
 * @property string $descripcion
 * @property string $detalle
 * @property string $detalle2
 * @property string $detalle3
 * @property string $empresa_idempresa
 *
 * The followings are the available model relations:
 * @property Empresa $empresaIdempresa
 */
class Empresaitem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	
	public function tableName()
	{
		return 'empresaitem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, empresa_idempresa', 'required'),
			array('descripcion, detalle, detalle2, detalle3', 'length', 'max'=>256),
			array('empresa_idempresa', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idempresaitem, descripcion, detalle, detalle2, detalle3, empresa_idempresa', 'safe', 'on'=>'search'),
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
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_idempresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idempresaitem' => 'Idempresaitem',
			'descripcion' => 'Descripcion',
			'detalle' => 'Detalle',
			'detalle2' => 'Detalle2',
			'detalle3' => 'Detalle3',
			'empresa_idempresa' => 'Empresa Idempresa',
			'datoitem'=>'datoitem',
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

		$criteria->compare('idempresaitem',$this->idempresaitem);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('detalle2',$this->detalle2,true);
		$criteria->compare('detalle3',$this->detalle3,true);
		$criteria->compare('empresa_idempresa',$this->empresa_idempresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresaitem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
