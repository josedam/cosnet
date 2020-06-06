<?php

/**
 * This is the model class for table "obras".
 *
 * The followings are the available columns in table 'obras':
 * @property integer $row_id
 * @property integer $cos
 * @property string $apyn
 * @property string $calle
 * @property string $npuer
 * @property string $piso
 * @property string $depto
 * @property string $barri
 * @property string $local
 * @property string $prov
 * @property string $cpost
 * @property string $ntel
 * @property integer $oscest
 * @property string $osfest
 * @property integer $tpprec
 * @property integer $codnom
 * @property integer $nomen
 * @property string $incmenor
 * @property integer $cuit
 * @property string $contacto
 * @property string $tipofac
 * @property string $email
 * @property string $denom
 * @property string $gerencia
 * @property integer $tlsfac
 */
class Obras extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Obras the static model class
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
		return 'obras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cos, oscest, tpprec, codnom, nomen, cuit, tlsfac', 'numerical', 'integerOnly'=>true),
			array('apyn, denom, gerencia', 'length', 'max'=>70),
			array('calle, barri, local', 'length', 'max'=>30),
			array('npuer, piso, depto, cpost', 'length', 'max'=>10),
			array('prov', 'length', 'max'=>25),
			array('ntel, email', 'length', 'max'=>50),
			array('incmenor, tipofac', 'length', 'max'=>1),
			array('contacto', 'length', 'max'=>40),
			array('osfest', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, cos, apyn, calle, npuer, piso, depto, barri, local, prov, cpost, ntel, oscest, osfest, tpprec, codnom, nomen, incmenor, cuit, contacto, tipofac, email, denom, gerencia, tlsfac', 'safe', 'on'=>'search'),
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
			'row_id' => 'Row',
			'cos' => 'Cos',
			'apyn' => 'Apyn',
			'calle' => 'Calle',
			'npuer' => 'Npuer',
			'piso' => 'Piso',
			'depto' => 'Depto',
			'barri' => 'Barri',
			'local' => 'Local',
			'prov' => 'Prov',
			'cpost' => 'Cpost',
			'ntel' => 'Ntel',
			'oscest' => 'Oscest',
			'osfest' => 'Osfest',
			'tpprec' => 'Tpprec',
			'codnom' => 'Codnom',
			'nomen' => 'Nomen',
			'incmenor' => 'Incmenor',
			'cuit' => 'Cuit',
			'contacto' => 'Contacto',
			'tipofac' => 'Tipofac',
			'email' => 'Email',
			'denom' => 'Denom',
			'gerencia' => 'Gerencia',
			'tlsfac' => 'Tlsfac',
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

		$criteria->compare('row_id',$this->row_id);
		$criteria->compare('cos',$this->cos);
		$criteria->compare('apyn',$this->apyn,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('npuer',$this->npuer,true);
		$criteria->compare('piso',$this->piso,true);
		$criteria->compare('depto',$this->depto,true);
		$criteria->compare('barri',$this->barri,true);
		$criteria->compare('local',$this->local,true);
		$criteria->compare('prov',$this->prov,true);
		$criteria->compare('cpost',$this->cpost,true);
		$criteria->compare('ntel',$this->ntel,true);
		$criteria->compare('oscest',$this->oscest);
		$criteria->compare('osfest',$this->osfest,true);
		$criteria->compare('tpprec',$this->tpprec);
		$criteria->compare('codnom',$this->codnom);
		$criteria->compare('nomen',$this->nomen);
		$criteria->compare('incmenor',$this->incmenor,true);
		$criteria->compare('cuit',$this->cuit);
		$criteria->compare('contacto',$this->contacto,true);
		$criteria->compare('tipofac',$this->tipofac,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('denom',$this->denom,true);
		$criteria->compare('gerencia',$this->gerencia,true);
		$criteria->compare('tlsfac',$this->tlsfac);

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

	
}
