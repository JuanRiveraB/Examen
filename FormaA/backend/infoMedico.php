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
        exit();
    } else {
        $json = MedicoController::buscarTodos();
        echo $json;
        exit();
    }
} else {
    echo "{\"error\": \"Error, solicite ayuda a soporte\"";
    exit();
}

