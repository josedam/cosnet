<?php

/**
 * This is the model class for table "pedidonum".
 *
 * The followings are the available columns in table 'pedidonum':
 * @property string $idpedidonum
 * @property string $numeropedido
 * @property string $fechapedido
 */
class Pedidonum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pedidonum the static model class
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
		return 'pedidonum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numeropedido', 'length', 'max'=>30),
			array('fechapedido', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpedidonum, numeropedido, fechapedido', 'safe', 'on'=>'search'),
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
			'idpedidonum' => 'Idpedidonum',
			'numeropedido' => 'Numeropedido',
			'fechapedido' => 'Fechapedido',
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

		$criteria->compare('idpedidonum',$this->idpedidonum,true);
		$criteria->compare('numeropedido',$this->numeropedido,true);
		$criteria->compare('fechapedido',$this->fechapedido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function proximoNumero($fecha)
	{
	  $model = Pedidonum::model()->findByAttributes(array('fechapedido'=>$fecha));
	  if(!$model){
	    $model = new Pedidonum;
	    $model->fechapedido = $fecha;
	    $model->numeropedido = 1;
	    $model->save();
	  } else {
	    $model->numeropedido = $model->numeropedido + 1;
	    $model->save();
	  }
	  
	  $num = $fecha.str_pad((int) $model->numeropedido, 5,"0",STR_PAD_LEFT);
	  $dv = Pedidonum::calculaDv($num);
	  return $num.$dv;
	}
	
	public static function calculaDv($num)
	{
      $msk = '971397139713';
      $num = str_pad((int) $num, 12,"0",STR_PAD_LEFT);
      $dv = 0;  
         
      for($i=0;$i<12;$i++){
        $dv += $msk[$i] * $num[$i]; 
      }
      $dv = 9 - ($dv % 9);
      return $dv;    
    }

/*
    function CalcDV9
    parameters yN
    private dv, n, msk
    dv = 0
    msk = '971397139713'
    n = Str(yn,12,0)
    dv = 0
    for i=1 to len(msk)
      dv = dv + ( val(SubStr(msk,i,1)) * val(SubStr(n,i,1)) )
    next i
    dv = 9 - mod(dv,9)
    return(dv)	
*/	

}
