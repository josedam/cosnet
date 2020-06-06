<?php

/**
 * This is the model class for table "pedidodetalle".
 *
 * The followings are the available columns in table 'pedidodetalle':
 * @property string $idpedidodetalle
 * @property string $idpedido
 * @property string $idproducto
 * @property string $cantidad
 * @property double $preciounitario
 * @property double $preciototal
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Producto $idproducto0
 * @property Pedido $idpedido0
 */
class Pedidodetalle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pedidodetalle the static model class
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
		return 'pedidodetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpedido, idproducto', 'required'),
			array('preciounitario, preciototal', 'numerical'),
			array('idpedido, idproducto, cantidad', 'length', 'max'=>10),
			array('observaciones','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpedidodetalle, idpedido, idproducto', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
			'pedido' => array(self::BELONGS_TO, 'Pedido', 'idpedido'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpedidodetalle' => 'Idpedidodetalle',
			'idpedido' => 'IdPedido',
			'idproducto' => 'Producto Solicitado',
			'cantidad' => 'Cantidad',
			'preciounitario' => 'Precio Unitario',
			'preciototal' => 'Precio Total',
			'observaciones'=>'Observaciones',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($idpedido)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->compare('idpedido',$idpedido);

	//	$criteria->compare('idpedidodetalle',$this->idpedidodetalle,true);
		
	//	$criteria->compare('idproducto',$this->idproducto,true);
	/*	$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('preciounitario',$this->preciounitario);
		$criteria->compare('preciototal',$this->preciototal);
    */

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
    public function dataFromProducto($prod)
    {
      $this->idproducto = $prod->idproducto;
      $this->preciounitario = $prod->precioventa;
      $pd->cantidad = 1;
      $this->preciototal = $prod->precioventa;

    }
    
    protected function beforeSave()
    {
      $this->preciototal = $this->preciounitario * $this->cantidad;
      
      return parent::beforeSave();
    }
/*    
    protected function afterSave()
    {
      $this->pedido->actualizaTotal();
      
      return parent::afterSave;
    }
*/	
}
