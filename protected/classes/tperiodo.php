<?php

class tperiodo
{
   private $periodo = 0;

	function __construct($periodo=0)
	{
		$this->periodo = $periodo;
	}

	public function getValue() {
		return $this->periodo;
	}

	public function setValue($newValue = 0) {
		$this->periodo = $newValue;
	}

	public function asString()
	{
		$s= substr($this->periodo,4,2).'/'.substr($this->periodo,0,4);
		return $s;
	}

	public function asText()
	{
		$s = '';
		$s= $this->nombreMes(substr($this->periodo,4,2)).'/'.substr($this->periodo,0,4);
		return $s;		
	}

	private function nombreMes($mes, $largo=0)
	{
		$s='';
		switch ($mes) {
			case 1:
				$s='Enero';
				break;
			case 2:
				$s='Febrero';
				break;
			case 3:
				$s='Marzo';
				break;
			case 4:
				$s='Abril';
				break;
			case 5:
				$s='Mayo';
				break;
			case 6:
				$s='Junio';
				break;
			case 7:
				$s='Julio';
				break;
			case 8:
				$s='Agosto';
				break;
			case 9:
				$s='Septiembre';
				break;
			case 10:
				$s='Octubre';
				break;
			case 11:
				$s='Noviembre';
				break;
			case 12:
				$s='Diciembre';
				break;
			
			default:
				$s=$mes;
				break;
		}
		if ($largo>0) {
			$s = substr($s,0,$largo);
		}
		return $s;
	}

	public function fromTime($time) {
		$hoy = getdate($time);
		$this->fromMesAnio($hoy['mon'], $hoy['year'] );
		return;
	}

	public function fromMesAnio($mes = 0, $anio = 0 ) {
		if ($anio > 0) {
			$this->periodo = $anio*100 + $mes;
		}
		return $this->periodo;
	}

	public function mes() {
		return substr($this->periodo,4,2);
	}
	
	public function anio() {
		return substr($this->periodo,0,4);
	}

	public function asMeses() {
		return $this->anio()*12 + $this->mes() - 1; 
	}

	public function fromMeses($meses) {
		$anio = intVal( $meses / 12);
		$mes = ($meses % 12) + 1;
		return $this->fromMesAnio($mes, $anio);
	}

	public function sumarMeses($cant = 0) {
		return $this->fromMeses($this->asMeses() + $cant);
	}

	public function nextPeriodo() {
		return $this->sumarMeses(1);
	}
	
	public function prevPeriodo() {
		return $this->sumarMeses(-1);
	}
}


?>