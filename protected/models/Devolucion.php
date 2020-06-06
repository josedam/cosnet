<?php

/**
 * This is the model class for table "devolucion".
 *
 * The followings are the available columns in table 'devolucion':
 * @property integer $iddevolucion
 * @property integer $idcaptura
 * @property integer $idregis
 * @property integer $transac
 * @property integer $cos
 * @property string $ffac
 * @property integer $npres
 * @property integer $csoc
 * @property integer $tipo
 * @property integer $nlote
 * @property integer $nitem
 * @property string $practicas
 * @property string $fprac
 * @property integer $cant
 * @property string $coper
 * @property string $factu
 * @property string $hactu
 * @property integer $cmotivo
 * @property string $paciente
 * @property string $obse
 * @property integer $estado
 * @property string $festado
 * @property integer $iduser
 */
class Devolucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'devolucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcaptura', 'required'),
			array('idcaptura, idregis, transac, cos, npres, csoc, tipo, nlote, nitem, cant, cmotivo, estado, iduser', 'numerical', 'integerOnly'=>true),
			array('practicas, paciente', 'length', 'max'=>45),
			array('coper', 'length', 'max'=>10),
			array('hactu', 'length', 'max'=>5),
			array('ffac, fprac, factu, obse, festado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iddevolucion, idcaptura, idregis, transac, cos, ffac, npres, csoc, tipo, nlote, nitem, practicas, fprac, cant, coper, factu, hactu, cmotivo, paciente, obse, estado, festado, iduser', 'safe', 'on'=>'search'),
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
            'obra' => array(self::BELONGS_TO, 'obra', 'cos'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddevolucion' => 'Iddevolucion',
			'idcaptura' => 'Idcaptura',
			'idregis' => 'Idregis',
			'transac' => 'Transac',
			'cos' => 'Obra Social',
			'ffac' => 'Fecha Factura',
			'npres' => 'Presentacion',
			'csoc' => 'Profesional',
			'tipo' => 'Tipo de Orden',
			'nlote' => 'Orden Numero',
			'nitem' => 'Nitem',
			'practicas' => 'Practicas',
			'fprac' => 'Fecha de Practica',
			'cant' => 'Cant',
			'coper' => 'Coper',
			'factu' => 'Factu',
			'hactu' => 'Hactu',
			'cmotivo' => 'Motivo',
			'paciente' => 'Paciente',
			'obse' => 'Observaciones',
			'estado' => 'estado',
			'festado' => 'Fecha Estado',
			'iduser' => 'Operador',
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

		$criteria->compare('iddevolucion',$this->iddevolucion);
		$criteria->compare('idcaptura',$this->idcaptura);
		$criteria->compare('idregis',$this->idregis);
		$criteria->compare('transac',$this->transac);
		$criteria->compare('cos',$this->cos);
		$criteria->compare('ffac',$this->ffac,true);
		$criteria->compare('npres',$this->npres);
		$criteria->compare('csoc',$this->csoc);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('nlote',$this->nlote);
		$criteria->compare('nitem',$this->nitem);
		$criteria->compare('practicas',$this->practicas,true);
		$criteria->compare('fprac',$this->fprac,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('coper',$this->coper,true);
		$criteria->compare('factu',$this->factu,true);
		$criteria->compare('hactu',$this->hactu,true);
		$criteria->compare('cmotivo',$this->cmotivo);
		$criteria->compare('paciente',$this->paciente,true);
		$criteria->compare('obse',$this->obse,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('festado',$this->festado,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Devolucion2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

//////////////////////////////////////////////////////////////////////////////////////////////
	public function searchSocio($csoc = null, $estado=1)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
        if (! $csoc) {
        	$csoc = Yii::app()->user->csoc;
        }

		$criteria=new CDbCriteria;

		$criteria->compare('csoc',$csoc);
		$criteria->compare('estado',$estado);
		$criteria->order = 'ffac DESC, cos';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }	

   	public function marcarEntregado(){
		$this->estado = 2;
		$this->festado = date('d/m/Y H:i:s');
		$this->iduser = Yii::app()->user->id;
		$this->save();
	}


}
