<?php

/**
 * This is the model class for table "bhtrans".
 *
 * The followings are the available columns in table 'bhtrans':
 * @property integer $row_id
 * @property integer $nroliq
 * @property string $apyn
 * @property integer $ctcta
 * @property string $nctab
 * @property string $cbu1
 * @property string $cbu2
 * @property integer $tdoc
 * @property integer $ndoc
 * @property string $facre
 * @property double $imp
 * @property integer $csoc
 * @property double $simp
 * @property string $tarjeta
 * @property string $nombre
 * @property string $fcupon
 * @property string $ncupon
 * @property double $impcupon
 * @property string $plan
 * @property double $dctotarj
 * @property double $dctocirc
 * @property string $frmpgo
 */
class Bhtrans extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bhtrans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imp, simp, impcupon, dctotarj, dctocirc', 'required'),
			array('nroliq, ctcta, tdoc, ndoc, csoc', 'numerical', 'integerOnly'=>true),
			array('imp, simp, impcupon, dctotarj, dctocirc', 'numerical'),
			array('apyn', 'length', 'max'=>40),
			array('nctab', 'length', 'max'=>15),
			array('cbu1', 'length', 'max'=>8),
			array('cbu2', 'length', 'max'=>14),
			array('tarjeta', 'length', 'max'=>20),
			array('nombre', 'length', 'max'=>30),
			array('ncupon', 'length', 'max'=>12),
			array('plan', 'length', 'max'=>10),
			array('frmpgo', 'length', 'max'=>1),
			array('facre, fcupon', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('row_id, nroliq, apyn, ctcta, nctab, cbu1, cbu2, tdoc, ndoc, facre, imp, csoc, simp, tarjeta, nombre, fcupon, ncupon, impcupon, plan, dctotarj, dctocirc, frmpgo', 'safe', 'on'=>'search'),
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
			'nroliq' => 'Nroliq',
			'apyn' => 'Apyn',
			'ctcta' => 'Ctcta',
			'nctab' => 'Nctab',
			'cbu1' => 'Cbu1',
			'cbu2' => 'Cbu2',
			'tdoc' => 'Tdoc',
			'ndoc' => 'Ndoc',
			'facre' => 'Facre',
			'imp' => 'Imp',
			'csoc' => 'Csoc',
			'simp' => 'Simp',
			'tarjeta' => 'Tarjeta',
			'nombre' => 'Nombre',
			'fcupon' => 'Fcupon',
			'ncupon' => 'Ncupon',
			'impcupon' => 'Impcupon',
			'plan' => 'Plan',
			'dctotarj' => 'Dcto Tarj',
			'dctocirc' => 'Dcto Circ',
			'frmpgo' => 'Frmpgo',
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

		$criteria->compare('row_id',$this->row_id);
		$criteria->compare('nroliq',$this->nroliq);
		$criteria->compare('apyn',$this->apyn,true);
		$criteria->compare('ctcta',$this->ctcta);
		$criteria->compare('nctab',$this->nctab,true);
		$criteria->compare('cbu1',$this->cbu1,true);
		$criteria->compare('cbu2',$this->cbu2,true);
		$criteria->compare('tdoc',$this->tdoc);
		$criteria->compare('ndoc',$this->ndoc);
		$criteria->compare('facre',$this->facre,true);
		$criteria->compare('imp',$this->imp);
		$criteria->compare('csoc',$this->csoc);
		$criteria->compare('simp',$this->simp);
		$criteria->compare('tarjeta',$this->tarjeta,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fcupon',$this->fcupon,true);
		$criteria->compare('ncupon',$this->ncupon,true);
		$criteria->compare('impcupon',$this->impcupon);
		$criteria->compare('plan',$this->plan,true);
		$criteria->compare('dctotarj',$this->dctotarj);
		$criteria->compare('dctocirc',$this->dctocirc);
		$criteria->compare('frmpgo',$this->frmpgo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function detalleSocio($lq, $csoc = null)
    {
       // $id=Yii::app()->user->name;
        // $csoc = substr($id,2);

        if (! $csoc) {
        	$csoc = Yii::app()->user->csoc;
        }
        
        //echo 'Detalle socio:'.$csoc.'<br>';

        $criteria=new CDbCriteria;

        $criteria->compare('csoc',$csoc);
        $criteria->compare('nroliq',$lq);
        $criteria->order = 'nombre';
        
        return $this->findAll($criteria);
    
    }

    public function behaviors()
    {
      
      return array(
         'datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior'),
        ); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bhtrans the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
