<?php

include_once __DIR__ . "/controller/AtencionController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["NSecu"]) && isset($_POST["sEstadoCE"])) {

        $exito = AtencionController::cambiarAtencion($_POST["NSecu"], $_POST["sEstadoCE"]);
        if ($exito) {
            header("Location: ../frontend/VistasNiveles/Secretaria/Agendar.php?Cambiado");
            echo '<script type="text/javascript">alert("Atención Guardada");</script>';
            exit();
        }
        header("Location: ../frontend/VistasNiveles/Secretaria/Agendar.php?ErrorAlCambiar");
        exit();
    }else{
        header("Location: ../frontend/VistasNiveles/Secretaria/Agendar.php?ErrorDesconocido");
        exit();
    }
}
