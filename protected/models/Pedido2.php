<?php

/**
 * This is the model class for table "pedido".
 *
 * The followings are the available columns in table 'pedido':
 * @property string $idpedido
 * @property string $idestadopedido
 * @property string $iduser
 * @property string $numeropedido
 * @property string $fechahora
 * @property double $totalbruto
 * @property double $totalneto
 * @property string $fechapedido
 * @property string $email
 * @property string $telefono
 * @property string $idformaenvio
 * @property string $idformapago
 *
 * The followings are the available model relations:
 * @property Estadopedido $idestadopedido0
 * @property Pedidodetalle[] $pedidodetalles
 */
class Pedido2 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pedido2 the static model class
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
		return 'pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idestadopedido', 'required'),
			array('totalbruto, totalneto', 'numerical'),
			array('idestadopedido, iduser, idformaenvio, idformapago', 'length', 'max'=>10),
			array('numeropedido', 'length', 'max'=>30),
			array('email, telefono', 'length', 'max'=>50),
			array('fechahora, fechapedido', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpedido, idestadopedido, iduser, numeropedido, fechahora, totalbruto, totalneto, fechapedido, email, telefono, idformaenvio, idformapago', 'safe', 'on'=>'search'),
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
			'idestadopedido0' => array(self::BELONGS_TO, 'Estadopedido', 'idestadopedido'),
			'pedidodetalles' => array(self::HAS_MANY, 'Pedidodetalle', 'idpedido'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpedido' => 'Idpedido',
			'idestadopedido' => 'Idestadopedido',
			'iduser' => 'Iduser',
			'numeropedido' => 'Numeropedido',
			'fechahora' => 'Fechahora',
			'totalbruto' => 'Totalbruto',
			'totalneto' => 'Totalneto',
			'fechapedido' => 'Fechapedido',
			'email' => 'Email',
			'telefono' => 'Telefono',
			'idformaenvio' => 'Idformaenvio',
			'idformapago' => 'Idformapago',
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

		$criteria->compare('idpedido',$this->idpedido,true);
		$criteria->compare('idestadopedido',$this->idestadopedido,true);
		$criteria->compare('iduser',$this->iduser,true);
		$criteria->compare('numeropedido',$this->numeropedido,true);
		$criteria->compare('fechahora',$this->fechahora,true);
		$criteria->compare('totalbruto',$this->totalbruto);
		$criteria->compare('totalneto',$this->totalneto);
		$criteria->compare('fechapedido',$this->fechapedido,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('idformaenvio',$this->idformaenvio,true);
		$criteria->compare('idformapago',$this->idformapago,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}