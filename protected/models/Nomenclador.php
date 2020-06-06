<?php

/**
 * This is the model class for table "nomenclador".
 *
 * The followings are the available columns in table 'nomenclador':
 * @property string $idnomenclador
 * @property string $ccol
 * @property string $cnom
 * @property string $cprac
 * @property string $deno
 * @property double $gal1
 * @property double $gal2
 * @property double $gal3
 * @property double $gto
 * @property string $modanes
 * @property string $kayud
 * @property string $tunid
 */
class Nomenclador extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nomenclador the static model class
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
		return 'nomenclador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gal1, gal2, gal3, gto', 'numerical'),
			array('ccol, cnom, cprac, modanes, kayud', 'length', 'max'=>10),
			array('deno', 'length', 'max'=>512),
			array('tunid', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idnomenclador, ccol, cnom, cprac, deno, gal1, gal2, gal3, gto, modanes, kayud, tunid', 'safe', 'on'=>'search'),
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
			'idnomenclador' => 'Idnomenclador',
			'ccol' => 'Ccol',
			'cnom' => 'Cnom',
			'cprac' => 'Cprac',
			'deno' => 'Deno',
			'gal1' => 'Gal1',
			'gal2' => 'Gal2',
			'gal3' => 'Gal3',
			'gto' => 'Gto',
			'modanes' => 'Modanes',
			'kayud' => 'Kayud',
			'tunid' => 'Tunid',
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

		$criteria->compare('idnomenclador',$this->idnomenclador,true);
		$criteria->compare('ccol',$this->ccol,true);
		$criteria->compare('cnom',$this->cnom,true);
		$criteria->compare('cprac',$this->cprac,true);
		$criteria->compare('deno',$this->deno,true);
		$criteria->compare('gal1',$this->gal1);
		$criteria->compare('gal2',$this->gal2);
		$criteria->compare('gal3',$this->gal3);
		$criteria->compare('gto',$this->gto);
		$criteria->compare('modanes',$this->modanes,true);
		$criteria->compare('kayud',$this->kayud,true);
		$criteria->compare('tunid',$this->tunid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function edCPrac()
    {
      $pr = str_pad($this->cprac, 8, '0',STR_PAD_LEFT);
     $d='';
      $s='';
      for($i=0; $i<8; $i+=2){
        $st=substr($pr,$i,2);
        if($st!='00'){
          $s.=$d.$st;
          $d='.';
        }
      }
      
      return $s;
    }
    
    public function arancel($fprac)
    {
      $model = Obraprecio::model()->arancelPractica($this->cnom, $this->cprac, $fprac);
      return $model;
    }
    
    public function nomencladorOS($cnom)
    {
      $criteria = new CDbCriteria;
      $criteria->compare('cnom',$cnom);
      $criteria->order = 'cprac';
      $model = $this->model()->findAll($criteria);
      return $model;
    }	
}
