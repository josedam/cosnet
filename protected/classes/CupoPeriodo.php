<?php

class CupoPeriodo extends tPeriodo {


function __construct() {
    parent::__construct();
    $this->iniciarPeriodoCupo();
}

public function fechaD() {
    return 0;
}

public function fechaA() {
    return 0;
}

private function iniciarPeriodoCupo() {
    if ($this->esDeHoy()) {
        $this->loadPeriodo();
    } else {
        $this->nuevoPeriodo();
    }
}

private function loadPeriodo() {
    if (Yii::app()->user->getState('cupoPeriodo')) {
        $this->setValue(Yii::app()->user->getState('cupoPeriodo'));
    } else {
        $this->nuevoPeriodo();
    }
}

private function fechaDeHoy() {
   return date("y.m.d");
}

private function esDeHoy() {
    return ((Yii::app()->user->getState('cupoFechaDia')) &&
        (Yii::app()->user->getState('cupoFechaDia') == $this->fechaDeHoy()));
}

public function nuevoPeriodo() {
    $this->fromTime(time()); // setValue($this->nuevoPeriodo());
    $this->savePeriodo();
}

private function savePeriodo() {
    Yii::app()->user->setState('cupoPeriodo', $this->getValue());
    Yii::app()->user->setState('cupoFechaDia', $this->fechaDeHoy());
}

public function mesSiguiente() {
    $this->nextPeriodo();
    $this->savePeriodo();
}

public function mesAnterior() {
    $this->prevPeriodo();
    $this->savePeriodo();
}

}

?>