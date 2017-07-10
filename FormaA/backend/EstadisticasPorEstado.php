<?php
include_once __DIR__ . "/controller/AtencionController.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])){
        $json1 =  AtencionController::estatEstado();
        echo $json1;
        exit();
    } else {
        echo "{\"error\": \"Error, solicite ayuda a soporte\"\"}";
        exit();
    }
}