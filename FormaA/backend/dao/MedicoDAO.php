<?php
/**
 * Description of MedicoDAO
 *
 * @author Juan
 */
include_once __DIR__ . "\..\domain\Medico.php";
class MedicoDAO {
    
    /**
     *
     * @var PDO
     */
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    public function buscarRut($rut) {
        $med = new Medico();
        $query = 'SELECT * FROM `medico` WHERE  `MEDICO_RUT` = :rut';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':rut', $rut);
        $sentencia->execute();

        while ($registro = $sentencia->fetch()) {
            $med->setRutMedico($registro["0"]);
            $med->setNomMedico($registro["1"]);
            $med->setFechaNac($registro["2"]);
            $med->setEspecialidad($registro["3"]);
            $med->setValorConsul($registro["4"]);
        }
        return $med;
    }
    
    public function buscarTodos() {
        $listado = Array();

        $registros = $this->conexion->query('SELECT * FROM `medico`');

        $registros->execute();

        while ($registro = $registros->fetch()) {
            $med = new Medico();
            $med->setRutMedico($registro["0"]);
            $med->setNomMedico($registro["1"]);
            $med->setFechaNac($registro["2"]);
            $med->setEspecialidad($registro["3"]);
            $med->setValorConsul($registro["4"]);
            array_push($listado, $med->jsonSerialize());
        }
        return $listado;
    }
}
