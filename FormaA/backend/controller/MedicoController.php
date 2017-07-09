<?php
/**
 * Description of MedicoController
 *
 * @author Juan
 */
include_once __DIR__ . "\..\dao\BaseDatos.php";
include_once __DIR__ . "\..\dao\MedicoDAO.php";
include_once __DIR__ . "\..\domain\Medico.php";
class MedicoController {
    
    public static function buscarPorRut($rut){
        
        $conexion = BaseDatos::getConexion();
        $daoMedico = new MedicoDAO($conexion);        
        return json_encode($daoMedico->buscarRut($rut)->jsonSerialize());
    }
    
    public static function buscarTodos(){
        
        $conexion = BaseDatos::getConexion();
        $daoMedico = new MedicoDAO($conexion);        
        return json_encode($daoMedico->buscarTodos());
    }
    
    public static function buscarPorRutJson($rut){
        
        $conexion = BaseDatos::getConexion();
        $daoMedico = new MedicoDAO($conexion);        
        return json_encode($daoMedico->buscarRutMedicoJson($rut));
    }
}
