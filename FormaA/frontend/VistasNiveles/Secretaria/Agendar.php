<!DOCTYPE html>
<?php include "../../php/Session.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/inicio.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="../../js/jquery.Rut.js" type="text/javascript"></script>
        <script src="../../js/Agendar.js" type="text/javascript"></script>
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
                    <button onclick="agendar()">Agendar Nueva Atención</button>
                    <button onclick="cEstado()">Cambiar Estado de Atención</button>
                    <br/>
                    <br/>
                    <div id="Agendar">
                        <form>
                            <table border="1">
                            <tbody>
                                <tr>
                                    <td>Fecha de Atencion:</td>
                                    <td><input type="date" required=""/></td>
                                </tr>
                                <tr>
                                    <td>Rut Persona:</td>
                                    <td><input type="text" name="rutPaciente"/></td>
                                </tr>
                                <tr>
                                    <td>Rut Medico:</td>
                                    <td><input type="text" name="rutMedico"/></td>
                                    <td><input type="text" name="nombre"/></td>
                                    <td><input type="text" name="valor"/></td>
                                </tr>
                                <tr>
                                    <td>Estado:</td>
                                    <td>
                                        <select name="sEstado" required="">
                                            <option></option>
                                            <option>agendada</option>
                                            <option>confirmada</option>
                                            <option>anulada</option>
                                            <option>perdida</option>
                                            <option>realizada</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><button>Agendar</button></td>
                                    <td><input type="reset" alt="Limpiar"/></td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <div id="cEstado">
                        
                    </div>
                </div>
            </center>
            <footer id="bottom">
                <p>Diseño de aplicaciones web</p>
            </footer>
        </div>
    </body>
</html>
