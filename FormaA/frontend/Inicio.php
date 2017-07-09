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
                    <a class="Inicio" href="Inicio.php">Inicio</a>
                    <a class="Salir" href="php/Salir.php">Cerrar Sessión</a>
                </div>
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <center>
                        <div id="OpAdmin" class="Admin">
                            <a href="">Opciones Pacientes</a>
                            <a href="">Opciones Médicos</a>
                            <a href="">Opciones Usuarios</a>
                        </div>
                        <div id="OpDirector" class="Director">
                            <a href="">Opciones Pacientes</a>
                            <a href="">Opciones Médicos</a>
                            <a href="">Opciones Atenciones</a>
                        </div>
                        <div id="OpSecretaria" class="Secretaria">
                            <a href="">Listar Pacientes</a>
                            <a href="">Listar Médicos</a>
                            <a href="VistasNiveles/Secretaria/ListarAtenciones.php">Listar Atenciones</a>
                            <a href="VistasNiveles/Secretaria/Agendar.php">Agendar, Confirmar y Etc. Atenciones</a>
                        </div>
                        <div id="OpPaciente" class="Paciente">
                            <a href="VistasNiveles/Paciente/Atenciones.php">Mis Atenciones</a>
                        </div>
                    </center>
                </div>
            </center>
            <footer class="bottom">
                <p>Diseño de Aplicaciones para Internet</p>
            </footer>
        </div>
    </body>
</html>
