<?php

session_start();
if ($_SESSION['autenticado'] != "SI") {
    $host = $_SERVER['HTTP_HOST'];
    $extra = 'Login.php';
    header("Location: http://$host/Examen/FormaA/frontend/$extra");
    exit();
}

