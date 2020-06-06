<?php

/**
 * This is the model class for table "prcos".
 *
 * The followings are the available columns in table 'prcos':
 * @property integer $row_id
 * @property integer $esta
 * @property integer $codigo
 * @property integer $cod
 * @property string $prcodigo
 * @property string $prnombre
 * @property integer $prcant
 * @property double $precio
 * @property double $precompra
 * @property double $privta
 * @property double $cual
 * @property double $contado
 * @property double $credito
 * @property double $cuotas
 * @property double $contant
 * @property double $credant
 * @property double $cuotant
 * @property double $busoant
 * @property double $nati
 * @property double $prevta40
 * @property double $privta2
 * @property double $prevta240
 * @property string $prlab
 * @property string $prrubro
 * @property integer $prpunto
 * @property integer $buso
 * @property integer $porclab
 * @property string $febaja
 * @property string $motivo
 * @property integer $aparato
 */
class Prcos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prcos the static model class
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
		return 'prcos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('esta, codigo, cod, prcant, prpunto, buso, porclab, aparato', 'numerical', 'integerOnly'=>true),
			array('precio, precompra, privta, cual, contado, credito, cuotas, contant, credant, cuotant, busoant, nati, prevta40, privta2, prevta240', 'numerical'),
			array('prcodigo', 'length', 'max'=>6),
			array('prnombre', 'length', 'max'=>30),
			array('prlab', 'length', 'max'=>3),
			array('prrubro', 'length', 'max'=>2),
			array('motivo', 'length', 'max'=>40),
			array('febaja', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, esta, codigo, cod, prcodigo, prnombre, prcant, precio, precompra, privta, cual, contado, credito, cuotas, contant, credant, cuotant, busoant, nati, prevta40, privta2, prevta240, prlab, prrubro, prpunto, buso, porclab, febaja, motivo, aparato', 'safe', 'on'=>'search'),
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
			'esta' => 'Esta',
			'codigo' => 'Codigo',
			'cod' => 'Cod',
			'prcodigo' => 'Prcodigo',
			'prnombre' => 'Prnombre',
			'prcant' => 'Prcant',
			'precio' => 'Precio',
			'precompra' => 'Precompra',
			'privta' => 'Privta',
			'cual' => 'Cual',
			'contado' => 'Contado',
			'credito' => 'Credito',
			'cuotas' => 'Cuotas',
			'contant' => 'Contant',
			'credant' => 'Credant',
			'cuotant' => 'Cuotant',
			'busoant' => 'Busoant',
			'nati' => 'Nati',
			'prevta40' => 'Prevta40',
			'privta2' => 'Privta2',
			'prevta240' => 'Prevta240',
			'prlab' => 'Prlab',
			'prrubro' => 'Prrubro',
			'prpunto' => 'Prpunto',
			'buso' => 'Buso',
			'porclab' => 'Porclab',
			'febaja' => 'Febaja',
			'motivo' => 'Motivo',
			'aparato' => 'Aparato',
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
		$criteria->compare('esta',$this->esta);
		$criteria->compare('codigo',$this->codigo);
		$criteria->compare('cod',$this->cod);
		$criteria->compare('prcodigo',$this->prcodigo,true);
		$criteria->compare('prnombre',$this->prnombre,true);
		$criteria->compare('prcant',$this->prcant);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('precompra',$this->precompra);
		$criteria->compare('privta',$this->privta);
		$criteria->compare('cual',$this->cual);
		$criteria->compare('contado',$this->contado);
		$criteria->compare('credito',$this->credito);
		$criteria->compare('cuotas',$this->cuotas);
		$criteria->compare('contant',$this->contant);
		$criteria->compare('credant',$this->credant);
		$criteria->compare('cuotant',$this->cuotant);
		$criteria->compare('busoant',$this->busoant);
		$criteria->compare('nati',$this->nati);
		$criteria->compare('prevta40',$this->prevta40);
		$criteria->compare('privta2',$this->privta2);
		$criteria->compare('prevta240',$this->prevta240);
		$criteria->compare('prlab',$this->prlab,true);
		$criteria->compare('prrubro',$this->prrubro,true);
		$criteria->compare('prpunto',$this->prpunto);
		$criteria->compare('buso',$this->buso);
		$criteria->compare('porclab',$this->porclab);
		$criteria->compare('febaja',$this->febaja,true);
		$criteria->compare('motivo',$this->motivo,true);
		$criteria->compare('aparato',$this->aparato);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}