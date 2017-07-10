<!DOCTYPE html>
<?php include "../../php/Session.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/login.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/inicio.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="../../js/jquery.Rut.js" type="text/javascript"></script>
        <script src="../../js/Estadisticas.js" type="text/javascript"></script>
        
        <title>Estadisticas</title>
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
                        <label>Seleccionar Estadisticas por :
                        <div name="rfechas">
                        </div>
                        <div name="mes">
                        </div>
                        <button name="btngenerar3" class="botonSesion">Especialidad</button></br>
                        <div class="especalidad">                            
                        </div>                        
                        <button name="btngenerar4" class="botonSesion">Medico</button></br>
                        <div class="medico">
                        </div>
                        <button name="btngenerar5" class="botonSesion">Estado</button></br>
                        <div class="estado">
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
