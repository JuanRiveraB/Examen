<?php

include_once __DIR__ . "/controller/PersonaController.php";
include_once __DIR__ . "/domain/Persona.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["rut"]) && isset($_POST["pass"])) {
        //Codigo a validar de login
        $persona = new Persona();
        $rut = $_POST["rut"];
        $pass = base64_encode($_POST['pass']);
        $persona = PersonaController::inicioSesion($rut, $pass);
        if ($persona->getPersonaRut() === $rut && $persona->getContrasena() === $pass) {
            session_start();
            $_SESSION['autenticado'] = "SI";
            $_SESSION['personaRut'] = $persona->getPersonaRut();
            $_SESSION['personaNom'] = $persona->getPersonaNom();
            $_SESSION['nivel'] = $persona->getNivel();
            header("Location: ../frontend/Inicio.php");
            exit();
            //echo json_encode($persona->jsonSerialize());
        } else {
            //si no existe se va a login.php con link de error
            header("Location: ../frontend/Login.php?errorusuario=si");
            exit();
        }
    } else if (isset($_POST["registroRut"]) && isset($_POST["registroNombre"])) {
        //Codigo a registrar
    }
}
