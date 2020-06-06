<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property string $idempresa
 * @property string $nombre
 * @property string $comercio
 * @property string $telefonos
 * @property string $observaciones
 *  @property string $datos
 *
 * The followings are the available model relations:
 * @property Empresaitem[] $empresaitems
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre','required'),
			array('nombre, comercio', 'length', 'max'=>45),
			array('telefonos', 'length', 'max'=>128),
			array('observaciones', 'length', 'max'=>256),
			array('datosGenerales','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idempresa, nombre, comercio, telefonos, observaciones', 'safe', 'on'=>'search'),
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
			'empresaitems' => array(self::HAS_MANY, 'Empresaitem', 'empresa_idempresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idempresa' => 'Idempresa',
			'nombre' => 'Nombre',
			'comercio' => 'ID del Comercio',
			'telefonos' => 'Telefonos',
			'observaciones' => 'Observaciones',
			'datosGenerales'=>'Datos Generales',
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

		$criteria->order='nombre';

		$criteria->compare('idempresa',$this->idempresa,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('comercio',$this->comercio,true);
		$criteria->compare('telefonos',$this->telefonos,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function datosGenerales($sep='</br>')
	{ 
	  	$r='';
	  	if($this->comercio<>'')
      		$r.=$this->texto('ID ',$this->comercio, $sep);
      	if($this->telefonos<>'')
      	   	$r.=$this->texto('Tel.',$this->telefonos, $sep);
      	if($this->observaciones<>'')
      		$r.=$this->texto('',$this->observaciones, $sep);
  		return $r;
  	}
  	
  	private function texto($label, $value='', $sep='</br>')
  	{
       return '<i>'.CHtml::encode($label).'</i>'.CHtml::encode($value).$sep;
  	}	
	
    public function detalleItems()
    {
    	$r='';
    	foreach ($this->empresaitems as $item) {
    		$r.=$this->texto2($item->descripcion,$item->detalle);
    	}
    	return $r;
    }
  	private function texto2($label, $value='')
  	{
       return CHtml::encode($label).', '.CHtml::encode($value).'</br>';
  	}	


}
