<?php

/**
 * Description of infoPersona
 *
 * @author Juan
 */
include_once __DIR__ . "/controller/PersonaController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if ($id != "") {
            $json = PersonaController::buscarPorRutJson($_GET["id"]);
            echo $json;
            exit();
        } else {
            $json = PersonaController::buscarTodosPacientes();
            echo $json;
            exit();
        }
    } else {
        echo "{\"error\": \"Error, solicite ayuda a soporte\"";
        exit();
    }
}

