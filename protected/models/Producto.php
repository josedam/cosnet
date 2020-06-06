<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property string $idproducto
 * @property string $idrubro
 * @property string $prcod
 * @property string $barras
 * @property string $nombre
 * @property double $preciocompra
 * @property double $precioventa
 * @property string $cantidad
 * @property double $puntopedido
 * @property integer $activo
 * @property integer $publicado
 * @property integer $alaventa
 * @property integer $muestraprecio
 *
 * The followings are the available model relations:
 * @property Pedidodetalle[] $pedidodetalles
 * @property Rubro $idrubro0
 */
class Producto extends CActiveRecord
{

    public $imagen = '';
    public $rub = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Producto the static model class
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
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrubro,nombre', 'required'),
			array('prcod','safe'),
			array('activo, publicado, alaventa, muestraprecio', 'numerical', 'integerOnly'=>true),
			array('preciocompra, precioventa, puntopedido', 'numerical'),
			array('idrubro, prcod, cantidad', 'length', 'max'=>10),
			array('barras', 'length', 'max'=>30),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idproducto, idrubro, prcod, barras, nombre, activo, publicado, alaventa, muestraprecio', 'safe', 'on'=>'search'),
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
			'detalles' => array(self::HAS_MANY, 'Pedidodetalle', 'idproducto'),
			'rubro' => array(self::BELONGS_TO, 'Rubro', 'idrubro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproducto' => 'Producto',
			'idrubro' => 'Rubro',
			'prcod' => 'Codigo',
			'barras' => 'Barras',
			'nombre' => 'Nombre',
			'preciocompra' => 'Precio Compra',
			'precioventa' => 'Precio',
			'cantidad' => 'Cantidad',
			'puntopedido' => 'Punto Repos.',
			'activo' => 'Activo',
			'publicado' => 'Publicado',
			'alaventa' => 'A la Venta',
			'muestraprecio' => 'Muestra Precio',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($todos=false)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('rubro');
		if(!$todos){
	  	  $criteria->compare('rubro.alaventa',1);
		  $criteria->compare('t.alaventa',1);
          $criteria->compare('activo',1);
        }


	//	$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('t.idrubro',$this->idrubro);
	//	$criteria->compare('prcod',$this->prcod);
	//	$criteria->compare('barras',$this->barras);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('t.activo',$this->activo);
		$criteria->compare('t.precioventa',$this->precioventa);
		$criteria->compare('t.cantidad',$this->cantidad);
		$criteria->compare('t.puntopedido',$this->puntopedido);
	//	$criteria->compare('publicado',$this->publicado);
	//	$criteria->compare('alaventa',$this->alaventa);
	//	$criteria->compare('muestraprecio',$this->muestraprecio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
              'defaultOrder'=>'t.nombre ASC',
              'attributes'=>array(
                'idrubro'=>array(
                   'asc'=>'rubro.nombre,t.nombre',
                   'desc'=>'rubro.nombre DESC, t.nombre ASC',
                  ),

                'cantidad'=>array(
                   'asc'=>'t.cantidad,t.nombre',
                   'desc'=>'t.cantidad DESC, t.nombre ASC',
                  ),
                  
                'precioventa'=>array(
                   'asc'=>'t.precioventa,t.nombre',
                   'desc'=>'t.precioventa DESC, t.nombre ASC',
                  ),

                'activo'=>array(
                   'asc'=>'t.activo,t.nombre',
                   'desc'=>'t.activo DESC, t.nombre ASC',
                  ),

                'alaventa'=>array(
                   'asc'=>'t.alaventa,t.nombre',
                   'desc'=>'t.alaventa DESC, t.nombre ASC',
                  ),
                  

                '*',
              ), 
            ),			
		));
	}
	
	public function getOptions($rubro=0)
    { 
      $criteria = new CDbCriteria;
      $criteria->order='t.idrubro, t.nombre';
      if(!$rubro==0){
        $criteria->compare('idrubro',$rubro);
      }
      return CHtml::listData($this->findAll($criteria),'idproducto','nombre');
    }
	
}
