<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/inicio.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <link href="../../css/login.css" rel="stylesheet" type="text/css"/>
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
                    <a href="../../php/Salir.php">Cerrar Sessión</a>
                </div>
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    
                </div>
            </center>
            <footer id="bottom">
                <p>Diseño de aplicaciones web</p>
            </footer>
        </div>
    </body>
</html>
