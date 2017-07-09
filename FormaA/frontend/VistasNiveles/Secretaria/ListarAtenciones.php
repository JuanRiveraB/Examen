<!DOCTYPE html>
<?php include "../../php/Session.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/inicio.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="../../js/jquery.Rut.js" type="text/javascript"></script>
        <script src="../../js/ListarAtenciones.js" type="text/javascript"></script>
        <title>Mis Atenciones</title>
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
                    <a class="Inicio" href="../../Inicio.php">Inicio</a>
                    <a class="Salir" href="../../php/Salir.php">Cerrar Sessión</a>
                </div>
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <center>
                        <label>Consultar por Rut Paciente: </label><button class="button2" name="Listar">Listar Atenciones</button>
                        <div class="listarAtenciones">
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
