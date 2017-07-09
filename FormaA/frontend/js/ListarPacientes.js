jQuery(document).ready(function () {
    /**
     * Manejo del campo RUT
     */
    jQuery("input[name='rutPacienteL']").Rut({format_on: 'keyup'});
    jQuery("input[name='rutPacienteL']").blur(function () {
        if (this.value !== "") {

            if (!validarRutPaciente()) {
                jQuery(this).addClass("error");
                alert('El rut ingresado no esta correcto');
            } else {
                jQuery(this).removeClass("error");
            }
        }
    });
    
    //Funcion que lista por el rut del paciente o todos
    jQuery("button[name='ListarPacienSec']").click(function () {
        mostrarImagenCargando();
        quitarFormatoRut();
        var rut = jQuery("input[name='rutPacienteL']").val();
        jQuery.getJSON("/Examen/FormaA/backend/infoPersona.php",
                {id: rut.toString().trim()},
                function (Pacientes) {
                    //Html se ocupa para crear una tabla nueva
                    var html = '<table class ="table" >';
                    html += '<tbody>';
                    html += '<tr><th>Rut Perosna</th>';
                    html += '<th>Nombre</th>';
                    html += '<th>Fecha Nacimiento</th>';
                    html += '<th>Sexo</th>';
                    html += '<th>Dirección</th>';
                    html += '<th>Teléfono</th></tr>';
                    jQuery.each(Pacientes, function (indice, Persona) {
                        html += '<tr><td>' + Persona["rutPersona"] + '</td><td>' + Persona["nomPersona"] + '</td><td>' + Persona["fechaNac"] + '</td><td>' + Persona["sexo"] + '</td><td>' + Persona["direccion"] + '</td><td>' + Persona["telefono"] + '</td></tr>';
                    });
                    html += '</tbody></table>';
                    jQuery('div.ListarPacientes').html(html);
                    ocultarImagenCargando();
                });
    });
});

function mostrarImagenCargando() {
    jQuery("#cargandoAjax").css("visibility", "visible");
}

function ocultarImagenCargando() {
    jQuery("#cargandoAjax").css("visibility", "hidden");
}

function validarRutPaciente() {
    var rut = jQuery("input[name='rutPacienteL']").val();
    return jQuery.Rut.validar(rut);
}

function quitarFormatoRut() {
    var rut = jQuery("input[name='rutPacienteL']").val();
    var rutSinFormato = jQuery.Rut.quitarFormato(rut);
    document.getElementById('rutPacienLis').value = rutSinFormato;
}