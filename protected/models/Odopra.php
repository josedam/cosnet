<?php

/**
 * This is the model class for table "odopra".
 *
 * The followings are the available columns in table 'odopra':
 * @property integer $idodopra
 * @property integer $cos
 * @property integer $nafil
 * @property integer $gpar
 * @property integer $ndoc
 * @property integer $nord
 * @property string $faut
 * @property integer $csoc
 * @property string $coper
 * @property string $fdia
 * @property integer $cest
 * @property integer $idafil
 *
 * The followings are the available model relations:
 * @property Afil $idafil0
 * @property Odopraitem[] $odopraitems
 */
class Odopra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'odopra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('faut, idafil', 'required'),
			array('cos, nafil, gpar, ndoc, nord, csoc, cest, idafil', 'numerical', 'integerOnly'=>true),
			array('coper', 'length', 'max'=>45),
			array('fdia', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idodopra, cos, nafil, gpar, ndoc, nord, faut, csoc, coper, fdia, cest, idafil', 'safe', 'on'=>'search'),
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
			'afil' => array(self::BELONGS_TO, 'Afil', 'idafil'),
			'odopraitems' => array(self::HAS_MANY, 'Odopraitem', 'idodopra'),
		);
	}
	
	public function behaviors()
	{
		return array(
		'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
		); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
	}	  

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idodopra' => 'Idodopra',
			'cos' => 'Cos',
			'nafil' => 'Nafil',
			'gpar' => 'Gpar',
			'ndoc' => 'Ndoc',
			'nord' => 'Nord',
			'faut' => 'Faut',
			'csoc' => 'Csoc',
			'coper' => 'Coper',
			'fdia' => 'Fdia',
			'cest' => 'Cest',
			'idafil' => 'Idafil',
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

		$criteria->compare('idodopra',$this->idodopra);
		$criteria->compare('cos',$this->cos);
		$criteria->compare('nafil',$this->nafil);
		$criteria->compare('gpar',$this->gpar);
		$criteria->compare('ndoc',$this->ndoc);
		$criteria->compare('nord',$this->nord);
		$criteria->compare('faut',$this->faut,true);
		$criteria->compare('csoc',$this->csoc);
		$criteria->compare('coper',$this->coper,true);
		$criteria->compare('fdia',$this->fdia,true);
		$criteria->compare('cest',$this->cest);
		$criteria->compare('idafil',$this->idafil);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Odopra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function datosPaciente() {
		$r='';
		$r.=$this->linea($this->textoTag($this->tagStrong(), $this->afil?$this->afil->apyn:''));
		$r.=$this->texto('',$this->NombreObra().' - Nro: '.$this->edNAfil());
		return $r;
	}

	public function datosPracticas() {
		$r='<table>';
    	foreach ($this->odopraitems as $item) {
    		$r.='<tr>'.$this->lineaPractica($item).'</tr>';
		}
		$r.='</table>';
    	return $r;
	}

	private function lineaPractica($item) {
		$r='';
		$r.='<td class="tabla-sin-borde-centro" width="70px">'.$this->edCPrac($item->cprac).'</td>';
		$r.='<td class="tabla-sin-borde-centro" width="10px">'.$item->pieza.'</td>';
		$r.='<td class="tabla-sin-borde-centro" width="10px">'.$item->cara.'</td>';
		$r.='<td class="tabla-sin-borde-derecha" width="100px">'.number_format($item->impunit,2).'</td>';
		return $r;
	}

	private function edCPrac($cprac) {
		$r = str_pad($cprac, 8, '0', STR_PAD_LEFT);
		if (substr($r,0,2)=='00') {
			$r = substr($r,2);
		}
		if (substr($r,-2, 2)=='00') {
			$r = substr($r,0,strlen($r)-2);
		}
		$s = '';
		$c = '';
		for ($i=0; $i < strlen($r); $i+=2) { 
			$s .= $c.substr($r, $i, 2);
			$c = '.';
		}
		return $s;
	}

	public function totalOrden() {
		$r = 0;
		foreach ($this->odopraitems as $item) {
    		$r+=$item->importeTotal();
		}
    	return $r;
	}

	private function NombreObra() {
		$r='';
		switch ($this->cos) {
			case 0:
				$r = 'IOSEP';
				break;
			case 67:
				$r = 'HAMBURGO IOSEP';
				break;
			default:
				$r='('.$this->cos.')';
		}
		return $r;
	}

	private function edNAfil() {
		return $this->nafil.'/'.$this->gpar;
	}

	private function tagStrong() {
		return array('abre'=>'<strong>', 'cierra'=>'</strong>');
	}
	private function textoTag($tag, $value){
		return $tag['abre'].$value.$tag['cierra'];
	}

	private function linea($texto) {
		return $texto.'</br>';
	}

	private function texto($label, $value='')
  	{
       return ($label!=''?'<i>'.CHtml::encode($label).'</i>':'').CHtml::encode($value);
	}	
	

}
