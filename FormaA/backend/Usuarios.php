<?php

include_once __DIR__ . "/controller/PersonaController.php";
include_once __DIR__ . "/domain/Persona.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["rut"]) && isset($_POST["pass"])) {
        $persona = new Persona();
        $persona = PersonaController::inicioSesion($_POST["rut"], $_POST["pass"]);
        if ($persona->getPersonaRut() === $_POST["rut"] && $persona->getContrasena() === $_POST["pass"]) {
            session_start();
            $_SESSION['persona'] = $persona;
            $_SESSION['autenticado'] = "SI";
            header("Location: ../frontend/Inicio.php");
            //echo json_encode($persona->jsonSerialize());
        } else {
            //si no existe se va a login.php
            header("Location: ../frontend/Login.php?errorusuario=si");
        }
    }
}
