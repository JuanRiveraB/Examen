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
        <title>Listar Atenciones</title>
    </head>
    <body>
        <div id="contenido">
            <div id="cargandoAjax">
                <img src="../../img/ajax-loader.gif" alt="cargando..."/>
            </div>
            <header id="top">
                <div id="Perfil">
                    Bienvenido/a: <label id="nomPer">
                        <?php
                        if (isset($_SESSION["personaNom"]) && isset($_SESSION["nivel"])) {
                            echo $_SESSION["personaNom"].', '.$_SESSION["nivel"];
                        }
                        ?></label>
                    <a class="Inicio" href="../../Inicio.php">Inicio</a>
                    <a class="Salir" href="../../php/Salir.php">Cerrar Sessión</a>
                </div>
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <center>
                        <label>Consultar por Numero de atención o todas(Dejar el texto en blanco): </label><input type="text" name="nAtencionL"/>
                        <button name="Listar">Listar Atenciones</button>

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
