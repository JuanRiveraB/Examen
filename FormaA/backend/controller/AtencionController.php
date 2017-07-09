<?php
/**
 * Description of AtencionController
 *
 * @author Juan
 */
include_once __DIR__ . "\..\dao\BaseDatos.php";
include_once __DIR__ . "\..\dao\AtencionDAO.php";
include_once __DIR__ . "\..\domain\Atencion.php";
class AtencionController {
    
    public static function ingresarAtencion($fecha, $rutP, $rutM, $estado){
        
        $conexion = BaseDatos::getConexion();
        $daoAtencion = new AtencionDAO($conexion);        
        return $daoAtencion->ingresarAtencion($fecha, $rutP, $rutM, $estado);
    }
    
    public static function cambiarAtencion($numeroUnico, $estado){
        
        $conexion = BaseDatos::getConexion();
        $daoAtencion = new AtencionDAO($conexion);        
        return $daoAtencion->modificarAtencion($numeroUnico, $estado);
    }
    
    public static function buscarNumero($numeroUnico){
        
        $conexion = BaseDatos::getConexion();
        $daoAtencion = new AtencionDAO($conexion);        
        return json_encode($daoAtencion->buscarNumero($numeroUnico)->jsonSerialize());
    }
    
    public static function  bucarTodas(){
        $conexion = BaseDatos::getConexion();
        $daoAtencion = new AtencionDAO($conexion);        
        return json_encode($daoAtencion->buscarTodos());
    }
}
