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
class Pedido extends CActiveRecord
{
    public $PedAct;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pedido the static model class
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
            array('idpedido', 'safe', 'on'=>'search'),
            array('email','required','on'=>'confirma'),
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
			'estado' => array(self::BELONGS_TO, 'Estadopedido', 'idestadopedido'),
            'formapago' => array(self::BELONGS_TO, 'Formapago', 'idformapago'),
            'formaenvio' => array(self::BELONGS_TO, 'Formaenvio', 'idformaenvio'),			
			'detalles' => array(self::HAS_MANY, 'Pedidodetalle', 'idpedido'),
            'user' => array(self::BELONGS_TO, 'User', 'iduser'),
            'detallecount' => array(self::STAT, 'Pedidodetalle', 'idpedido'),
            'detallesum' => array(self::STAT, 'Pedidodetalle', 'idpedido',
                                   'select'=>'round(sum(preciototal),2)',
                                  ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */ 
	 
	public function attributeLabels()
	{
		return array(
			'idpedido' => 'idpedido',
			'idestadopedido' => 'Idestadopedido',
			'iduser' => 'Iduser',
			'numeropedido' => 'Numero Pedido',
			'fechahora' => 'Fecha Hora',
			'totalbruto' => 'Total Bruto',
			'totalneto' => 'Total Neto',
            'fechapedido' => 'Fecha Pedido',
            'email' => 'eMail',
            'telefono' => 'Telefono',
            'idformaenvio' => 'Forma de Envio',
            'idformapago' => 'Forma de Pago',
			
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
	/*	$criteria->compare('idestadopedido',$this->idestadopedido,true);
		$criteria->compare('iduser',$this->iduser,true);
		$criteria->compare('numeropedido',$this->numeropedido,true);
		$criteria->compare('fechahora',$this->fechahora,true);
		$criteria->compare('totalbruto',$this->totalbruto);
		$criteria->compare('totalneto',$this->totalneto);
    */
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function pedidoActivo($usr=0)
	{
	  if ($usr==0){
	    $usr=Yii::app()->user->id;
	  }
	  if(!$this->PedAct){
	  
	    $this->PedAct=$this->findByAttributes(array('iduser'=>$usr,'idestadopedido'=>1));
	  }
	  return $this->PedAct;
	}
	
	public function nuevoPedido($usr)
	{
	  $this->iduser = $usr;
	  $this->idestadopedido = 1; // Iniciado
	  $this->numeropedido = ''; //$this->generaPedido();
	  $this->idformapago = 1;
	  $this->idformaenvio = 1;
	}
	
	public function confirmaPedido()
	{
	  $this->numeropedido = $this->generaPedido();
	  $this->fechapedido = date('Y-m-d H:i:s');
	  $this->idestadopedido = 2; // Recibido
	}
	
	public static function generaPedido()
	{
	  $n = date('Y'); //'Ymd');
	  $o = Pedidonum::proximoNumero($n);
	  return $o;
	}
	
	protected function beforeSave()
	{
	  if($this->isNewRecord){
	    $this->fechahora = date('Y-m-d H:i:s');
	  }
	  return parent::beforeSave();
	}
	

	public function actualizaTotal()
	{
	 // $this->totalneto = $this->detallesum;
	 // $this->save();
	}
}
