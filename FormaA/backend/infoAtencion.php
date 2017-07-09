<?php
/**
 * Description of infoPersona
 *
 * @author Juan
 */
include_once __DIR__ . "/controller/AtencionController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $json = AtencionController::buscarNumero($_GET["id"]);
        echo $json;
    } else {
        $json = AtencionController::bucarTodas();
        echo $json;
    }
} else {
    echo "{\"error\": \"Error, solicite ayuda a soporte\"";
    exit();
}