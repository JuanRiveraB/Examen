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
    
    public static function buscarPorRut($rut){
        
        $conexion = BaseDatos::getConexion();
        $daoPersona = new PersonaDAO($conexion);        
        return $daoPersona->buscarRut($rut);
    }
    
    public static function buscarPorRutJson($rut){
        
        $conexion = BaseDatos::getConexion();
        $daoPersona = new PersonaDAO($conexion);        
        return json_encode($daoPersona->buscarRutPacienteJson($rut));
    }
    
    public static function buscarTodosPacientes(){
        
        $conexion = BaseDatos::getConexion();
        $daoPersona = new PersonaDAO($conexion);        
        return json_encode($daoPersona->buscarTodosPacientes());
    }
}
