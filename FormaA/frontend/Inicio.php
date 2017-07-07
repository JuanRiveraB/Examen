<!DOCTYPE html>
<?php include "/php/Session.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="contenido">
            <header id="top">
                <a href="php/Salir.php">Cerrar Sessión</a>
            </header>
            <center>
                <div id="contenedor">
                    <?php
                    if (isset($_SESSION["elRut"])) {
                        echo $_SESSION["elRut"];
                    }
                    ?>
                </div>
            </center>
            <footer id="bottom">
                <p>Diseño de aplicaciones web</p>
            </footer>
        </div>
    </body>
</html>
