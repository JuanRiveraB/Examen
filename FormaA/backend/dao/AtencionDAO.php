<?php
/**
 * Description of AtencionDAO
 *
 * @author Juan
 */
include_once __DIR__ . "\..\domain\Atencion.php";
class AtencionDAO {
    /**
     *
     * @var PDO
     */
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    public function ingresarAtencion($fecha, $rutPersona, $rutMedico, $estado) {
        
        $query = "INSERT INTO ATENCION (FECHA_ATENCION, RUT_PERSONA, RUT_MEDICO, ESTADO) VALUES (:fecha, :rutP, :rutM, :estado)";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':fecha', $fecha);
        $sentencia->bindParam(':rutP', $rutPersona);
        $sentencia->bindParam(':rutM', $rutMedico);
        $sentencia->bindParam(':estado', $estado);
        
        return $sentencia->execute();
    }
    
    public function modificarAtencion($numero, $estado) {
        
        $query = "UPDATE ATENCION SET ESTADO = :estado WHERE N_SECUENCIAL = :numero";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':numero', $numero);
        $sentencia->bindParam(':estado', $estado);
        
        return $sentencia->execute();
    }
    public function buscarNumero($numero) {
        $listado = Array();
        $query = 'SELECT * FROM ATENCION WHERE N_SECUENCIAL = :numero';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':numero', $numero);
        $sentencia->execute();

        while ($registro = $sentencia->fetch()) {
            $aten = new Atencion();
            $aten->setNSecuencial($registro["0"]);
            $aten->setFechaAtencion($registro["1"]);
            $aten->setRutPersona($registro["2"]);
            $aten->setRutMedico($registro["3"]);
            $aten->setEstado($registro["4"]);
            array_push($listado, $aten->jsonSerialize());
        }
        return $listado;
    }
    
    public function buscarRut($rut) {
        $listado = Array();
        $query = 'SELECT * FROM ATENCION WHERE RUT_PERSONA = :rut';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':rut', $rut);
        $sentencia->execute();

        while ($registro = $sentencia->fetch()) {
            $aten = new Atencion();
            $aten->setNSecuencial($registro["0"]);
            $aten->setFechaAtencion($registro["1"]);
            $aten->setRutPersona($registro["2"]);
            $aten->setRutMedico($registro["3"]);
            $aten->setEstado($registro["4"]);
            array_push($listado, $aten->jsonSerialize());
        }
        return $listado;
    }
    
    public function buscarNumeroRut($rut, $numero) {
        $listado = Array();
        $query = 'SELECT * FROM ATENCION WHERE N_SECUENCIAL = :numero AND RUT_PERSONA = :rut';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':numero', $numero);
        $sentencia->bindParam(':rut', $rut);
        $sentencia->execute();

        while ($registro = $sentencia->fetch()) {
            $aten = new Atencion();
            $aten->setNSecuencial($registro["0"]);
            $aten->setFechaAtencion($registro["1"]);
            $aten->setRutPersona($registro["2"]);
            $aten->setRutMedico($registro["3"]);
            $aten->setEstado($registro["4"]);
            array_push($listado, $aten->jsonSerialize());
        }
        return $listado;
    }
    
    public function buscarTodos() {
        $listado = Array();

        $registros = $this->conexion->query('SELECT * FROM `atencion`');

        $registros->execute();

        while ($registro = $registros->fetch()) {
            $aten = new Atencion();
            $aten->setNSecuencial($registro["0"]);
            $aten->setFechaAtencion($registro["1"]);
            $aten->setRutPersona($registro["2"]);
            $aten->setRutMedico($registro["3"]);
            $aten->setEstado($registro["4"]);
            array_push($listado, $aten->jsonSerialize());
        }
        return $listado;
    }
}
