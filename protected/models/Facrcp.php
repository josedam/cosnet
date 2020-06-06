<?php

/**
 * This is the model class for table "facrcp".
 *
 * The followings are the available columns in table 'facrcp':
 * @property integer $id
 * @property string $periodo
 * @property integer $csoc
 * @property string $cantidad
 * @property integer $iduser
 * @property string $fecha
 * @property string $observaciones
 * @property string $fechaimpresion
 */
class Facrcp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $codigo = '';

	public function tableName()
	{
		return 'facrcp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periodo, csoc ', 'required'),
			array('csoc, iduser', 'numerical', 'integerOnly'=>true),
			array('periodo', 'length', 'max'=>6),
			array('cantidad', 'length', 'max'=>11),
			array('observaciones, fechaimpresion, iduser, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, periodo, csoc, cantidad, iduser, fecha, observaciones, fechaimpresion', 'safe', 'on'=>'search'),

   			array('id, periodo, cantidad, iduser, fecha, observaciones, fechaimpresion', 'safe', 'on'=>'pidesocio'),
   			array('csoc', 'required','on'=>'pidesocio'),

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
			'profesional' => array(self::BELONGS_TO, 'user', 'csoc'),
			'operador' => array(self::BELONGS_TO, 'user', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'periodo' => 'Periodo',
			'csoc' => 'Profesional',
			'cantidad' => 'Cantidad',
			'iduser' => 'Operador',
			'fecha' => 'Fecha Registro',
			'observaciones' => 'Observaciones',
			'fechaimpresion' => 'Fecha Impresion',
			'codigo'
		);
	}

	public function oPeriodo()
	{
		$periodo = new tperiodo($this->periodo);
		return $periodo;
	}

	public static function detalleSocio($model)
	{
		return Facrcp::model()->findAllByAttributes(array('csoc'=>$model->csoc, 'periodo'=>$model->periodo));
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

		$criteria->compare('periodo',$this->periodo,true);
		$criteria->compare('csoc',$this->csoc);
		$criteria->order='fecha';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPeriodo($modelPeriodo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('periodo',$modelPeriodo->periodo,true);
		$criteria->order = 'fecha';

		$criteria->compare('csoc',$this->csoc);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facrcp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->fecha = date('d/m/Y H:i:s');
			$this->iduser = Yii::app()->user->id;
		}
		return parent::beforeSave();
	}
    
    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }	

}
