<?php

/**
 * Description of infoAtencion
 *
 * @author Juan
 */
include_once __DIR__ . "/controller/AtencionController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if ($id != "") {
            $json = AtencionController::buscarNumero($id);
            echo $json;
        } else {
            $json = AtencionController::bucarTodas();
            echo $json;
        }
    } else {
        echo "{\"error\": \"Error, solicite ayuda a soporte\"\"}";
        exit();
    }
}