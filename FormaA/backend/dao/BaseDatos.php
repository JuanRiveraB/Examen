<?php

class BaseDatos {

    const HOST = "localhost";
    const DBNAME = "DAI_EXAMEN_3";
    const PORT = "3306";
    const USER = "root";
    const PASS = "";

    public static function getConexion() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";port=" . self::PORT . ";charset=utf8";
        try {
            $dbConexion = new PDO($dsn, self::USER, self::PASS);
            return $dbConexion;
        } catch (PDOException $exception) {
            switch ($exception->getCode()) {
                case 2002:
                    echo '<div class="error">No se pudo establecer la conexión con la base de datos, revise que la base de datos este activa.</div>';
                    exit;
                case 1045:
                    echo '<div class="error">No se pudo conectar a la base de datos, revise las credenciales configuradas</div>';
                    exit;
                case 1049: // La base de datos no existe.                        
                    $dbConexion = self::crearBaseDatos();
                    return $dbConexion;
                default:
                    echo '<div class="error">' . $exception->getMessage() . '</div>';
                    break;
            }
        }
    }

    private static function crearBaseDatos() {

        echo '<div class="warning">Base de datos no encontrada, se crear&aacute;...</div>';

        try {
            $dsn = "mysql:host=" . self::HOST . ";port=" . self::PORT . ";charset=utf8";
            $mysqlConexion = new PDO($dsn, self::USER, self::PASS);
            $mysqlConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mysqlConexion->exec("CREATE DATABASE " . self::DBNAME);
            $mysqlConexion->exec("USE " . self::DBNAME);

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `persona` (
      `PERSONA_RUT` INT(9) NOT NULL,
      `PERSONA_NOMCOMPLETO` VARCHAR(150) DEFAULT NULL,
      `FECHA_NACIMIENTO` DATE DEFAULT NULL,
      `SEXO` VARCHAR(20) DEFAULT NULL,
      `DIRECCION` VARCHAR(256) DEFAULT NULL,
      `TELEFONO` INT(10) DEFAULT NULL,
      `NIVEL` VARCHAR(20) DEFAULT NULL,
      `CONTRASENA` VARCHAR(256) DEFAULT NULL,
      PRIMARY KEY (`PERSONA_RUT`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    INSERT INTO `persona` (`PERSONA_RUT`, `PERSONA_NOMCOMPLETO`, `FECHA_NACIMIENTO`, `SEXO`, `DIRECCION`, `TELEFONO`, `NIVEL`, `CONTRASENA`) VALUES
    (123456785, 'Juan Perez', '1980-04-28', 'Masculino', '30362306091ef8d489fd8e92de49e5a40f3a2ffb6bda952f178fe394d8492fd9', 978464247, 'Paciente' , 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1')");
            
            $mysqlConexion->exec("
    INSERT INTO `persona` (`PERSONA_RUT`, `PERSONA_NOMCOMPLETO`, `FECHA_NACIMIENTO`, `SEXO`, `DIRECCION`, `TELEFONO`, `NIVEL`, `CONTRASENA`) VALUES
    (111111111, 'María Perez', '1990-05-15', 'Femenino', '30362306091ef8d489fd8e92de49e5a40f3a2ffb6bda952f178fe394d8492fd9', 971234247, 'Secretaria' , 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1')");

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `medico` (
      `MEDICO_RUT` INT(9) NOT NULL,
      `MEDICO_NOMCOMPLETO` VARCHAR(150) DEFAULT NULL,
      `MEDICO_FECHA_NACIMIENTO` DATE DEFAULT NULL,
      `ESPECIALIDAD` VARCHAR(20) DEFAULT NULL,
      `VALOR_CONSULTA` INT(30) DEFAULT NULL,
      PRIMARY KEY (`MEDICO_RUT`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    INSERT INTO `medico` (`MEDICO_RUT`, `MEDICO_NOMCOMPLETO`, `MEDICO_FECHA_NACIMIENTO`, `ESPECIALIDAD`, `VALOR_CONSULTA`) VALUES
    (109724041, 'Yolanda Cortina Vilalta', '1987-06-15', 'Medicina General', 40000)");

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `atencion` (
      `N_SECUENCIAL` INT NOT NULL AUTO_INCREMENT,
      `FECHA_ATENCION` DATE DEFAULT NULL,
      `RUT_PERSONA` INT(9) NOT NULL,
      `RUT_MEDICO` INT(9) NOT NULL,
      `ESTADO` VARCHAR(20) DEFAULT NULL,
      PRIMARY KEY (`N_SECUENCIAL`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    ALTER TABLE `atencion`
      ADD CONSTRAINT `atencion_pfk` FOREIGN KEY (`RUT_PERSONA`) REFERENCES `persona` (`PERSONA_RUT`) ON UPDATE CASCADE");

            $mysqlConexion->exec("
    ALTER TABLE `atencion`
      ADD CONSTRAINT `atencion_mfk` FOREIGN KEY (`RUT_MEDICO`) REFERENCES `medico` (`MEDICO_RUT`) ON UPDATE CASCADE");

            return $mysqlConexion;
        } catch (Exception $e) {
            echo $e->getMessage();
            die($e->getCode());
        }
    }
}
