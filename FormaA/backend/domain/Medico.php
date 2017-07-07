<?php
/**
 * Description of Medico
 *
 * @author Juan
 */
class Medico {
    private $rutMedico;
    private $nomMedico;
    private $fechaNac;
    private $especialidad;
    private $valorConsul;
    
    function __construct() {
        
    }

    function getRutMedico() {
        return $this->rutMedico;
    }

    function getNomMedico() {
        return $this->nomMedico;
    }

    function getFechaNac() {
        return $this->fechaNac;
    }

    function getEspecialidad() {
        return $this->especialidad;
    }

    function getValorConsul() {
        return $this->valorConsul;
    }

    function setRutMedico($rutMedico) {
        $this->rutMedico = $rutMedico;
    }

    function setNomMedico($nomMedico) {
        $this->nomMedico = $nomMedico;
    }

    function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    function setValorConsul($valorConsul) {
        $this->valorConsul = $valorConsul;
    }
    
    public function jsonSerialize() {
        $arregloAsociativo = Array("rutMedico" => $this->rutMedico,
                                   "nomMedico" => $this->nomMedico,
                                   "fechaNac"=>  $this->fechaNac, 
                                   "especialidad" => $this->especialidad,
                                   "vConsulta" => $this->valorConsul);
        return $arregloAsociativo;
    }
}
