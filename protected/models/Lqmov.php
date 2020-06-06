<?php

/**
 * This is the model class for table "lqmov".
 *
 * The followings are the available columns in table 'lqmov':
 * @property integer $row_id
 * @property string $fliq
 * @property integer $nroliq
 * @property integer $csoc
 * @property integer $creg
 * @property integer $cos
 * @property string $ffac
 * @property integer $nfac
 * @property double $liq_hon
 * @property double $liq_gto
 * @property double $pen_hon
 * @property double $pen_gto
 * @property double $aju_debe
 * @property double $aju_haber
 * @property string $fdesc
 * @property integer $cpto
 * @property integer $tcpt
 * @property integer $crub
 * @property double $debe
 * @property double $haber
 * @property double $saldo
 * @property string $obse
 * @property double $lecop
 * @property double $ilecop
 * @property double $ipesos
 * @property double $crlecop
 * @property integer $p_hon
 * @property integer $p_gto
 */
class Lqmov extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lqmov the static model class
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
		return 'lqmov';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroliq, csoc, creg, cos, nfac, cpto, tcpt, crub, p_hon, p_gto', 'numerical', 'integerOnly'=>true),
			array('liq_hon, liq_gto, pen_hon, pen_gto, aju_debe, aju_haber, debe, haber, saldo, lecop, ilecop, ipesos, crlecop', 'numerical'),
			array('obse', 'length', 'max'=>30),
			array('fliq, ffac, fdesc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, fliq, nroliq, csoc, creg, cos, ffac, nfac, liq_hon, liq_gto, pen_hon, pen_gto, aju_debe, aju_haber, fdesc, cpto, tcpt, crub, debe, haber, saldo, obse, lecop, ilecop, ipesos, crlecop, p_hon, p_gto', 'safe', 'on'=>'search'),
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
			'fliq' => 'Fliq',
			'nroliq' => 'Nroliq',
			'csoc' => 'Csoc',
			'creg' => 'Creg',
			'cos' => 'Cos',
			'ffac' => 'Ffac',
			'nfac' => 'Nfac',
			'liq_hon' => 'Liq Hon',
			'liq_gto' => 'Liq Gto',
			'pen_hon' => 'Pen Hon',
			'pen_gto' => 'Pen Gto',
			'aju_debe' => 'Aju Debe',
			'aju_haber' => 'Aju Haber',
			'fdesc' => 'Fdesc',
			'cpto' => 'Cpto',
			'tcpt' => 'Tcpt',
			'crub' => 'Crub',
			'debe' => 'Debe',
			'haber' => 'Haber',
			'saldo' => 'Saldo',
			'obse' => 'Obse',
			'lecop' => 'Lecop',
			'ilecop' => 'Ilecop',
			'ipesos' => 'Ipesos',
			'crlecop' => 'Crlecop',
			'p_hon' => 'P Hon',
			'p_gto' => 'P Gto',
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
		$criteria->compare('fliq',$this->fliq,true);
		$criteria->compare('nroliq',$this->nroliq);
		$criteria->compare('csoc',$this->csoc);
		$criteria->compare('creg',$this->creg);
		$criteria->compare('cos',$this->cos);
		$criteria->compare('ffac',$this->ffac,true);
		$criteria->compare('nfac',$this->nfac);
		$criteria->compare('liq_hon',$this->liq_hon);
		$criteria->compare('liq_gto',$this->liq_gto);
		$criteria->compare('pen_hon',$this->pen_hon);
		$criteria->compare('pen_gto',$this->pen_gto);
		$criteria->compare('aju_debe',$this->aju_debe);
		$criteria->compare('aju_haber',$this->aju_haber);
		$criteria->compare('fdesc',$this->fdesc,true);
		$criteria->compare('cpto',$this->cpto);
		$criteria->compare('tcpt',$this->tcpt);
		$criteria->compare('crub',$this->crub);
		$criteria->compare('debe',$this->debe);
		$criteria->compare('haber',$this->haber);
		$criteria->compare('saldo',$this->saldo);
		$criteria->compare('obse',$this->obse,true);
		$criteria->compare('lecop',$this->lecop);
		$criteria->compare('ilecop',$this->ilecop);
		$criteria->compare('ipesos',$this->ipesos);
		$criteria->compare('crlecop',$this->crlecop);
		$criteria->compare('p_hon',$this->p_hon);
		$criteria->compare('p_gto',$this->p_gto);

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
