<?php

include_once __DIR__ . "/controller/AtencionController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["FechaAten"]) && isset($_POST["rutPaciente"]) && isset($_POST["Medico"]) && isset($_POST["sEstado"])) {

        $exito = AtencionController::ingresarAtencion($_POST["FechaAten"], $_POST["rutPaciente"], $_POST["Medico"], $_POST["sEstado"]);
        if ($exito) {
            header("Location: ../frontend/VistasNiveles/Secretaria/Agendar.php?Ingresado");
            echo '<script type="text/javascript">alert("Atención Guardada");</script>';
            exit();
        }
        header("Location: ../frontend/VistasNiveles/Secretaria/Agendar.php?Error");
        exit();
    }else{
        header("Location: ../frontend/VistasNiveles/Secretaria/Agendar.php?Error");
        exit();
    }
}
