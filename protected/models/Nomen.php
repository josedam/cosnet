<?php

/**
 * This is the model class for table "nomen".
 *
 * The followings are the available columns in table 'nomen':
 * @property integer $row_id
 * @property integer $cnom
 * @property integer $ccol
 * @property integer $cprac
 * @property double $gal1
 * @property double $gal2
 * @property double $gal3
 * @property double $gto
 * @property integer $mod_anes
 * @property integer $tprac
 * @property integer $kayud
 * @property string $tunid
 * @property string $deno
 * @property integer $coseg
 * @property integer $cosegint
 * @property string $autoriza
 * @property string $norma
 * @property string $fvig
 * @property string $fvto
 * @property string $factu
 * @property string $coper
 * @property integer $grp_acm
 * @property string $modulo
 * @property string $nomen
 * @property string $obse
 */
class Nomen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nomen the static model class
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
		return 'nomen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cnom, ccol, cprac, mod_anes, tprac, kayud, coseg, cosegint, grp_acm', 'numerical', 'integerOnly'=>true),
			array('gal1, gal2, gal3, gto', 'numerical'),
			array('tunid', 'length', 'max'=>2),
			array('deno', 'length', 'max'=>120),
			array('autoriza, modulo, nomen', 'length', 'max'=>1),
			array('norma, coper', 'length', 'max'=>3),
			array('obse', 'length', 'max'=>100),
			array('fvig, fvto, factu', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, cnom, ccol, cprac, gal1, gal2, gal3, gto, mod_anes, tprac, kayud, tunid, deno, coseg, cosegint, autoriza, norma, fvig, fvto, factu, coper, grp_acm, modulo, nomen, obse', 'safe', 'on'=>'search'),
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
			'cnom' => 'Cnom',
			'ccol' => 'Ccol',
			'cprac' => 'Cprac',
			'gal1' => 'Gal1',
			'gal2' => 'Gal2',
			'gal3' => 'Gal3',
			'gto' => 'Gto',
			'mod_anes' => 'Mod Anes',
			'tprac' => 'Tprac',
			'kayud' => 'Kayud',
			'tunid' => 'Tunid',
			'deno' => 'Deno',
			'coseg' => 'Coseg',
			'cosegint' => 'Cosegint',
			'autoriza' => 'Autoriza',
			'norma' => 'Norma',
			'fvig' => 'Fvig',
			'fvto' => 'Fvto',
			'factu' => 'Factu',
			'coper' => 'Coper',
			'grp_acm' => 'Grp Acm',
			'modulo' => 'Modulo',
			'nomen' => 'Nomen',
			'obse' => 'Obse',
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
		$criteria->compare('cnom',$this->cnom);
		$criteria->compare('ccol',$this->ccol);
		$criteria->compare('cprac',$this->cprac);
		$criteria->compare('gal1',$this->gal1);
		$criteria->compare('gal2',$this->gal2);
		$criteria->compare('gal3',$this->gal3);
		$criteria->compare('gto',$this->gto);
		$criteria->compare('mod_anes',$this->mod_anes);
		$criteria->compare('tprac',$this->tprac);
		$criteria->compare('kayud',$this->kayud);
		$criteria->compare('tunid',$this->tunid,true);
		$criteria->compare('deno',$this->deno,true);
		$criteria->compare('coseg',$this->coseg);
		$criteria->compare('cosegint',$this->cosegint);
		$criteria->compare('autoriza',$this->autoriza,true);
		$criteria->compare('norma',$this->norma,true);
		$criteria->compare('fvig',$this->fvig,true);
		$criteria->compare('fvto',$this->fvto,true);
		$criteria->compare('factu',$this->factu,true);
		$criteria->compare('coper',$this->coper,true);
		$criteria->compare('grp_acm',$this->grp_acm);
		$criteria->compare('modulo',$this->modulo,true);
		$criteria->compare('nomen',$this->nomen,true);
		$criteria->compare('obse',$this->obse,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}