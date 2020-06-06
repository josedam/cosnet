<?php

/**
 * This is the model class for table "lqreci".
 *
 * The followings are the available columns in table 'lqreci':
 * @property integer $row_id
 * @property integer $csoc
 * @property integer $nroliq
 * @property string $fliq
 * @property string $tcbte
 * @property string $ncbte
 * @property string $coper
 * @property string $femi
 * @property double $bruto
 * @property double $neto
 */
class Lqreci extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lqreci the static model class
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
		return 'lqreci';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('csoc, nroliq', 'numerical', 'integerOnly'=>true),
			array('bruto, neto', 'numerical'),
			array('tcbte', 'length', 'max'=>1),
			array('ncbte', 'length', 'max'=>13),
			array('coper', 'length', 'max'=>3),
			array('fliq, femi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('row_id, csoc, nroliq, fliq, tcbte, ncbte, coper, femi, bruto, neto', 'safe', 'on'=>'search'),
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
			'csoc' => 'Csoc',
			'nroliq' => 'Nroliq',
			'fliq' => 'Fliq',
			'tcbte' => 'Tcbte',
			'ncbte' => 'Ncbte',
			'coper' => 'Coper',
			'femi' => 'Femi',
			'bruto' => 'Bruto',
			'neto' => 'Neto',
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
		$criteria->compare('csoc',$this->csoc);
		$criteria->compare('nroliq',$this->nroliq);
		$criteria->compare('fliq',$this->fliq,true);
		$criteria->compare('tcbte',$this->tcbte,true);
		$criteria->compare('ncbte',$this->ncbte,true);
		$criteria->compare('coper',$this->coper,true);
		$criteria->compare('femi',$this->femi,true);
		$criteria->compare('bruto',$this->bruto);
		$criteria->compare('neto',$this->neto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
    public function searchSocio($csoc = null)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        if (! $csoc) {
        	$csoc = Yii::app()->user->csoc;
	//        $id=Yii::app()->user->name;
	//        $csoc = substr($id,2);
        }

        $criteria=new CDbCriteria;

        $criteria->compare('csoc',$csoc);
        $criteria->order = 'nroliq desc';

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
