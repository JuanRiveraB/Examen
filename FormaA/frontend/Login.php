<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/jquery.Rut.js" type="text/javascript"></script>
        <script src="js/login.js" type="text/javascript"></script>
        <title>Login</title>
    </head>
    <body>
        <div id="contenido">
            <header id="top">
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <form id="frmLogin" action="../backend/Usuarios.php" method="POST">
                    <div class="imgcontainer">
                    <img src="img/images.png" class="avatar" alt="Perfil"/>
                    </div>
                    <br/>
                    <label><b>Rut</b></label>
                    <input type="text" placeholder="Ingrese Rut" id="rut" name="rut" required>
                    <label><b>Contraseña</b></label>
                    <input type="password" placeholder="Ingrese Contraseña" name="pass" required>
                    <button class="botonSesion" type="button" onclick="quitarFormatoRut()">Iniciar Sesión</button>
                </form>
            </div>
            </center>
            <footer id="bottom">
                <p>Diseño de aplicaciones web</p>
            </footer>
        </div>
    </body>
</html>
