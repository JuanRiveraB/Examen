<?php
/**
 * Description of PersonaController
 *
 * @author Juan
 */
include_once __DIR__ . "\..\dao\BaseDatos.php";
include_once __DIR__ . "\..\dao\PersonaDAO.php";
include_once __DIR__ . "\..\domain\Persona.php";

class PersonaController {
    
    public static function inicioSesion($rut, $pass){
        
        $conexion = BaseDatos::getConexion();
        $daoPersona = new PersonaDAO($conexion);        
        return $daoPersona->validarPersona($rut, $pass);
    }
}
