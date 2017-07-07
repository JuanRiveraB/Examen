<?php
session_start();
if ($_SESSION['autenticado'] != "SI") {
    header("Location: ../frontend/Login.php");
    exit();
}

