<?php

/**
 * CantidadForm class.
 */
class CantidadForm extends CFormModel
{
	public $idproducto;
	public $nombre;
	public $precioventa;
	public $cantidad;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('cantidad,idproducto', 'required'),
			array('cantidad', 'numerical', 'integerOnly'=>true, 'min'=>1),
			array('nombre,precioventa', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		    'idproducto'=>'Producto',
		    'nombre'=>'Producto',
			'precioventa'=>'Precio',
			'cantidad'=>'Cantidad',
		);
	}

}
