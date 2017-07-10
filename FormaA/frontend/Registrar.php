<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/jquery.Rut.js" type="text/javascript"></script>
        <script src="js/login.js" type="text/javascript"></script>
        <script src="../../js/Registrar.js" type="text/javascript"></script>
        <title>Registro</title>
    </head>
    <body>
        <div id="contenido">
            <header id="top">
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <h1>Registro Salud</h1>
                    <form id="frmRegistro" action="../backend/Usuarios.php" method="POST">
                        Rut: <input type="text" name="registroRut" required=""/>
                        <br/>
                        Nombre: <input type="text" name="registroNombre" required=""/>
                        <br/>
                        Fecha Nacimiento: <input type="date" name="registroFecha" required=""/>
                        <br/>
                        Sexo: 
                        <select name="registroSexo" required="">
                            <option>Selecione uno</option>
                            <option value="Masculino">Hombre</option>
                            <option value="Femenino">Mujer</option>
                        </select>
                        <br/>
                        Dirección: <input type="text" name="registroDireccion" required=""/>
                        <br/>
                        Teléfono: <input type="number" name="registroTelefono" required=""/>
                        <br/>
                        Contraseña: <input type="password" name="regitroContraseña" required=""/>
                        <br/>
                        Confirmar Contraseña: <input type="password" name="confirmContraseña" required=""/>
                        <br/>
                        <input class="nvl" name="registroNivel" value="Paciente"/>
                        <button class="botonSesion" onclick="comprobarClave()">Registrarse</button>
                        <button class="botonSesion2" onclick="volver()">Volver</button>
                    </form>
                </div>
            </center>
            <footer class="bottom">
                <p>Diseño de Aplicaciones para Internet</p>
            </footer>
        </div>
    </body>
</html>