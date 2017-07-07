<?php

/**
 * Description of PersonaDAO
 *
 * @author Juan
 */
include_once __DIR__ . "\..\domain\Persona.php";

class PersonaDAO {

    /**
     *
     * @var PDO
     */
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function validarPersona($rut, $pass) {
        $per = new Persona();
        $query = 'SELECT * FROM `persona` WHERE  `PERSONA_RUT` = :rut AND `CONTRASENA` =  :pass';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':pass', $pass);
        $sentencia->execute();

        while ($registro = $sentencia->fetch()) {
            $per->setPersonaRut($registro["0"]);
            $per->setPersonaNom($registro["1"]);
            $per->setPFechaNaci($registro["2"]);
            $per->setSexo($registro["3"]);
            $per->setDireccion($registro["4"]);
            $per->setTelefono($registro["5"]);
            $per->setNivel($registro["6"]);
            $per->setContrasena($registro["7"]);
        }
        return $per;
    }
    
    public function buscarRut($rut) {
        $per = new Persona();
        $query = 'SELECT * FROM `persona` WHERE  `PERSONA_RUT` = :rut';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':rut', $rut);
        $sentencia->execute();

        while ($registro = $sentencia->fetch()) {
            $per->setPersonaRut($registro["0"]);
            $per->setPersonaNom($registro["1"]);
            $per->setPFechaNaci($registro["2"]);
            $per->setSexo($registro["3"]);
            $per->setDireccion($registro["4"]);
            $per->setTelefono($registro["5"]);
            $per->setNivel($registro["6"]);
            $per->setContrasena($registro["7"]);
        }
        return $per;
    }
}
