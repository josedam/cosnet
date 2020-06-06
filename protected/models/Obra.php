<?php

/**
 * This is the model class for table "obra".
 *
 * The followings are the available columns in table 'obra':
 * @property string $idobra
 * @property string $nombre
 * @property string $razon
 * @property string $gerencia
 * @property string $cest
 * @property string $fest
 * @property string $calle
 * @property string $barrio
 * @property string $localidad
 * @property string $provincia
 * @property string $cpos
 * @property string $email
 * @property string $normas
 * @property string $fnew
 * @property string $fmod
 * @property string $tcoseg 
 * @property string $idnorma 
 */
class Obra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Obra the static model class
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
		return 'obra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idobra,nombre', 'required'),
			array('idobra, cest, cpos', 'length', 'max'=>10),
			array('idobra','unique','className'=>'Obra'),
			array('nombre,razon, gerencia, calle, barrio, localidad, email', 'length', 'max'=>128),
			array('provincia', 'length', 'max'=>64),
			array('fest, normas, fnew, fmod', 'safe'),
			array('email','email'),
			array('tcoseg','safe'),
			array('idnorma','safe'),

			array('nombre','filter','filter'=>'strtoupper'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idobra, nombre, cest, provincia', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		  'estado'=>array(self::BELONGS_TO, 'Estado','cest'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idobra' => 'Codigo',
			'nombre' => 'Nombre',
			'razon' => 'Razon Social',
			'gerencia' => 'Gerencia',
			'cest' => 'Estado',
			'fest' => 'Fecha',
			'calle' => 'Calle',
			'barrio' => 'Barrio',
			'localidad' => 'Localidad',
			'provincia' => 'Provincia',
			'cpos' => 'Cpos',
			'email' => 'Email',
			'normas' => 'Normas',
			'fnew' => 'Fnew',
			'fmod' => 'Fmod',
			'tcoseg' => 'Tipo de Coseguro',
			'idnorma' => 'Id Normas'
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

		$criteria->compare('idobra',$this->idobra,true);
		$criteria->compare('nombre',$this->nombre,true);
//		$criteria->compare('gerencia',$this->gerencia,true);
		$criteria->compare('cest',$this->cest,true);
//		$criteria->compare('fest',$this->fest,true);
//		$criteria->compare('calle',$this->calle,true);
//		$criteria->compare('barrio',$this->barrio,true);
//		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('provincia',$this->provincia,true);
//		$criteria->compare('cpos',$this->cpos,true);
//		$criteria->compare('email',$this->email,true);
//		$criteria->compare('normas',$this->normas,true);
//		$criteria->compare('fnew',$this->fnew,true);
//		$criteria->compare('fmod',$this->fmod,true);

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

   public function getLista()
   {
   	 $criteria = new CDbCriteria;
   	 $criteria->order='nombre';
  // 	 $criteria->compare('cest',1);

     $model = $this->findAll($criteria); //array('order'=>'nombre'));
     return $model;
   }

/* 
     public function getLista(){
       $url = $this->urlBase()."/cgi-bin/obrascgi.cgi?task=list";
       try {
         $variable = file_get_contents($url);
         $mensaje = json_decode($variable,true); // Decodifica como Array Asociado (true) y no como Objeto
       } catch (Exception $e) {
         $mensaje=$this->mensajeError($e->getMessage());
       }

       return $mensaje; 
     }
 */

     public function getNomenclador(){
       
       $model = Nomenclador::model()->nomencladorOS($this->codnom);
       return $model; 
     }

/*
     public function getDetalle($id){
       $url = $this->urlBase()."/cgi-bin/obrascgi.cgi?task=detalle&id=".$id;
       try {
         $variable = file_get_contents($url);
         $mensaje = json_decode($variable,true); // Decodifica como Array Asociado (true) y no como Objeto

       } catch (Exception $e) {
         $mensaje=$this->mensajeError($e->getMessage());
       }

       return $mensaje; 
     }
*/ 
     private function urlBase(){
      // $baseurl=Yii::app()->request->baseUrl;
       $baseurl=Yii::app()->params->urlcgi; //'http://www.cosantiago.com.ar';
      return $baseurl;
     }
     
     private function mensajeError($msg='Error...'){
       return array('RESULT'=>'ERROR','MSG'=>$msg,'DATA'=>'');
     }

    public function hasNormas($id)
    {
       $obr = $this->findByPk($id);
       return !(is_null($obr)||$obr->normas==''); 
    }
    
    public function imagenNormas()
    {
      if($this->Normas==''){
        $img = 'texto2.ico';
      } else {
        $img = 'texto.ico';
      }
      return Yii::app()->request->baseUrl.'/images/'.$img;
    
    }
    
    public function selectFecha($farn)
    {
      return Obrafarn::model()->selectFecha($this->codnom, $farn);
    }
    
/*
    public function beforeSave()
    {
      if ($this->isNewRecord) {
        $this->fnew = new CDbExpression("NOW('d/m/Y h:i:s')");
      }
      $this->fmod = new CDbExpression("NOW('d/m/Y h:i:s')");
      return parent::beforeSave();
    }    
 */       
}
