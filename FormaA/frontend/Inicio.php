<!DOCTYPE html>
<?php include "/php/Session.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/inicio.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/Inicio.js" type="text/javascript"></script>
        <title>Inicio</title>
    </head>
    <body>
        <div id="contenido">
            <header id="top">
                <div id="Perfil">
                    Bienvenido/a: <label id="nomPer">
                        <?php
                        if (isset($_SESSION["personaNom"])) {
                            echo $_SESSION["personaNom"];
                        }
                        ?></label>
                    <input id="nivel" class="nvl" value="
                        <?php
                        if (isset($_SESSION["nivel"])) {
                            echo $_SESSION["nivel"];
                        }
                        ?>" />
                    <a href="php/Salir.php">Cerrar Sessión</a>
                </div>
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <div id="OpAdmin" class="Admin">
                        <a href="">Opciones Pacientes</a>
                        <a href="">Opciones Médicos</a>
                        <a href="">Opciones Usuarios</a>
                    </div>
                    <div id="OpDirector" class="Director">
                        <a href="">Opciones Pacientes</a>
                        <a href="">Opciones Médicos</a>
                        <a href="">Opciones Atenciones</a>
                        <a href="">Consultar Estadísticas</a>
                    </div>
                    <div id="OpSecretaria" class="Secretaria">
                        <a href="">Opciones Pacientes</a>
                        <a href="">Opciones Médicos</a>
                        <a href="">Opciones Atenciones</a>
                        <a href="VistasNiveles/Secretaria/Agendar.php">Agendar, confirmar y anular atenciones</a>
                    </div>
                    <div id="OpPaciente" class="Paciente">
                        <a href="VistasNiveles/Paciente/Atenciones.php">Mis Atenciones</a>
                    </div>
                </div>
            </center>
            <footer id="bottom">
                <p>Diseño de aplicaciones web</p>
            </footer>
        </div>
    </body>
</html>
