<?php

include_once __DIR__ . "/controller/PersonaController.php";
include_once __DIR__ . "/domain/Persona.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["rut"]) && isset($_POST["pass"])) {
        $persona = new Persona();
        $rut = $_POST["rut"];
        $pass = $_POST["pass"];
        $persona = PersonaController::inicioSesion($rut, $pass);
        if ($persona->getPersonaRut() === $rut && $persona->getContrasena() === $pass) {
            session_start();
            $_SESSION['persona'] = $persona;
            $_SESSION['autenticado'] = "SI";
            $_SESSION['elRut'] = $persona->getPersonaRut();
            header("Location: ../frontend/Inicio.php");
            //echo json_encode($persona->jsonSerialize());
        } else {
            //si no existe se va a login.php
            header("Location: ../frontend/Login.php?errorusuario=si");
        }
    }
}
