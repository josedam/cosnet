<?php

class sessionPmt
{
	public static function setIdEmpresa($id)
	{
		Yii::app()->session['idempresa']=$id; 
	}

	public static function getIdEmpresa()
	{
		return Yii::app()->session['idempresa'];
	}
}