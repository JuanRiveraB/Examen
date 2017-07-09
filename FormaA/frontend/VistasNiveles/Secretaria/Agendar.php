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
                    <a class="Inicio" href="../../Inicio.php">Inicio</a>
                    <a class="Salir" href="../../php/Salir.php">Cerrar Sessión</a>
                </div>
            </header>
            <center>
                <div id="contenedor" class="contenedor">
                    <center>
                        <button class="button" onclick="agendar()">Agendar Nueva Atención</button>
                        <button class="button" onclick="cEstado()">Cambiar Estado de Atención</button>
                        <br/>
                        <br/>
                        <div id="Agendar" class="Agendar">
                            <form id="frmAgendar" method="POST" action="../../../backend/GuardarAtencion.php">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Fecha de Atencion:</td>
                                            <td><input type="date" name="FechaAten" required=""/></td>
                                        </tr>
                                        <tr>
                                            <td>Rut Persona:</td>
                                            <td><input id="rutP" type="text" name="rutPaciente" required=""/></td>
                                        </tr>
                                        <tr>
                                            <td>Medico:</td>
                                            <td>
                                                <select name="Medico" required="">
                                                    <option value="">Seleccione un Medico</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Estado:</td>
                                            <td>
                                                <select name="sEstado" required="">
                                                    <option value="">Seleccione una opción</option>
                                                    <option value="Agendada">Agendada</option>
                                                    <option value="Confirmada">Confirmada</option>
                                                    <option value="Anulada">Anulada</option>
                                                    <option value="Perdida">Perdida</option>
                                                    <option value="Realizada">Realizada</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="button2" onclick="quitarFormatoRutAgendar()">Agendar</button>
                                <input class="buttonCancel" type="reset" value="Limpiar/Cancelar"/>
                            </form>
                        </div>
                        <div id="cEstado" class="cEstado">
                            <form id="frmCEstado" method="POST" action="../../../backend/CambiarAtencion.php">
                                <h3>Buscar por Numero de Atención</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>N. Atención:</td>
                                            <td><input type="text" name="NSecu" required=""/></td>
                                        </tr>
                                        <tr>
                                            <td>Rut Persona:</td>
                                            <td><input id="rutP" type="text" name="rutPacienteCE" readonly=""/></td>
                                        </tr>
                                        <tr>
                                            <td>Fecha de Atencion:</td>
                                            <td><input type="date" name="FechaAtenCE" readonly=""/></td>
                                        </tr>
                                        <tr>
                                            <td>Rut Medico:</td>
                                            <td><input type="text" name="rutMedicoCE" readonly=""/></td>
                                            <td>Nombre Medico:</td>
                                            <td><input type="text" name="MedicoCE" readonly=""/></td>
                                        </tr>
                                        <tr>
                                            <td>Estado:</td>
                                            <td>
                                                <select name="sEstadoCE" required="">
                                                    <option value="">Seleccione una opción</option>
                                                    <option value="Agendada">Agendada</option>
                                                    <option value="Confirmada">Confirmada</option>
                                                    <option value="Anulada">Anulada</option>
                                                    <option value="Perdida">Perdida</option>
                                                    <option value="Realizada">Realizada</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="button2" onclick="cambiarEstado()">Cambiar estado</button>
                                <input class="buttonCancel" type="reset" value="Limpiar/Cancelar"/>
                            </form>
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
