<?php
/* @var $this ActualizaController */

$this->breadcrumbs=array(
	array('Actualiza'=>'index'),
);

$this->menu=array(
    array('label'=>'Home Actualiza'    , 'url'=>array('doaccion','accion'=>'index'      ,'titulo'=>'Pagina principal de Actualizaciones')), 
    array('label'=>'Obras Sociales'    , 'url'=>array('doaccion','accion'=>'obras'      ,'titulo'=>'Actualizacion Obras Sociales')),
    array('label'=>'Nomenclador'       , 'url'=>array('doaccion','accion'=>'nomenclador','titulo'=>'Actualizacion Nomenclador')),
    array('label'=>'Aranceles'         , 'url'=>array('doaccion','accion'=>'arancel'    ,'titulo'=>'Actualizacion Aranceles')),
    array('label'=>'Tabla de Conceptos', 'url'=>array('/tbcpto/admin')),
    array('label'=>'Liquidacion'       , 'url'=>array('liquidacion')),

//    array('label'=>'Obras F.Arancel', 'url'=>array('obrafarn')),
//    array('label'=>'Obras Precios'  , 'url'=>array('obraprecio')),
//    array('label'=>'Cptos Liquidacion'  , 'url'=>array('tbcpto')),
    

);


?>
<h1>Actualizacion de Sistema</h1>


