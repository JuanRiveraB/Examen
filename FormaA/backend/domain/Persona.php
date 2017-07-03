<?php
/**
 * Description of Persona
 *
 * @author Juan
 */
class Persona {
    
    private $PersonaRut;
    private $PersonaNom;
    private $PFechaNaci;
    private $Sexo;
    private $Direccion;
    private $telefono;
    private $nivel;
    
    function __construct() {
        
    }
    
    function getPersonaRut() {
        return $this->PersonaRut;
    }

    function getPersonaNom() {
        return $this->PersonaNom;
    }

    function getPFechaNaci() {
        return $this->PFechaNaci;
    }

    function getSexo() {
        return $this->Sexo;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setPersonaRut($PersonaRut) {
        $this->PersonaRut = $PersonaRut;
    }

    function setPersonaNom($PersonaNom) {
        $this->PersonaNom = $PersonaNom;
    }

    function setPFechaNaci($PFechaNaci) {
        $this->PFechaNaci = $PFechaNaci;
    }

    function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }
}
