<?php
/**
 * Description of Atencion
 *
 * @author Juan
 */
class Atencion {
    
    private $nSecuencial;
    private $fechaAtencion;
    private $rutPersona;
    private $rutMedico;
    private $estado;
    
    function __construct() {
        
    }
    
    function getNSecuencial() {
        return $this->nSecuencial;
    }

    function getFechaAtencion() {
        return $this->fechaAtencion;
    }

    function getRutPersona() {
        return $this->rutPersona;
    }

    function getRutMedico() {
        return $this->rutMedico;
    }

    function getEstado() {
        return $this->estado;
    }

    function setNSecuencial($nSecuencial) {
        $this->nSecuencial = $nSecuencial;
    }

    function setFechaAtencion($fechaAtencion) {
        $this->fechaAtencion = $fechaAtencion;
    }

    function setRutPersona($rutPersona) {
        $this->rutPersona = $rutPersona;
    }

    function setRutMedico($rutMedico) {
        $this->rutMedico = $rutMedico;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function jsonSerialize() {
        $arregloAsociativo = Array("nSecuencial" => $this->nSecuencial,
                                   "fecAtencion" => $this->fechaAtencion,
                                   "rutPersona"=>  $this->rutPersona, 
                                   "rutMedico" => $this->rutMedico,
                                   "estado" => $this->estado);
        return $arregloAsociativo;
    }
}
