<?php

/**
 * Description of infoAtencionPersona
 *
 * @author Juan
 */
include_once __DIR__ . "/controller/AtencionController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"]) && isset($_GET["id2"])) {
        $id = $_GET["id"];
        $id2 = $_GET["id2"];
        if ($id != "" && $id2 != "") {
            $json1 = AtencionController::buscarPorNumeroRut($id, $id2);
            echo $json1;
        }
    }
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if ($id != "") {
            $json2 = AtencionController::buscarPorRut($id);
            echo $json2;
        }
    }
    echo "{\"error\": \"Error, solicite ayuda a soporte\"\"}";
    exit();
}
