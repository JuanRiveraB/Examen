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
    private $contrasena;
    
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

    function getContrasena() {
        return $this->contrasena;
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

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    
    public function jsonSerialize() {
        $arregloAsociativo = Array("rutPersona" => $this->PersonaRut,
                                   "nomPersona" => $this->PersonaNom,
                                   "fechaNac"=>  $this->PFechaNaci, 
                                   "sexo" => $this->Sexo,
                                   "direccion" => $this->Direccion,
                                   "telefono"=>  $this->telefono, 
                                   "nivel" => $this->nivel,
                                   "contrasena"=>  $this->contrasena);
        return $arregloAsociativo;
    }
}
