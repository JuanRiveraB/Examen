<?php
/**
 * Description of infoPersona
 *
 * @author Juan
 */
include_once __DIR__ . "/controller/MedicoController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $json = MedicoController::buscarPorRut($_GET["id"]);
        echo $json;
    } else {
        $json = MedicoController::buscarTodos();
        echo $json;
    }
} else {
    echo "{\"error\": \"Error, solicite ayuda a soporte\"";
    exit();
}

