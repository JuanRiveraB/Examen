jQuery(document).ready(function () {
    /**
     * Manejo del campo RUT
     */
    jQuery("input[name='rutMedicoL']").Rut({format_on: 'keyup'});
    jQuery("input[name='rutMedicoL']").blur(function () {
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
    jQuery("button[name='ListarMedicoSec']").click(function () {
        mostrarImagenCargando();
        quitarFormatoRut();
        var rut = jQuery("input[name='rutMedicoL']").val();
        jQuery.getJSON("/Examen/FormaA/backend/infoMedicoListar.php",
                {id: rut.toString().trim()},
                function (Medicos) {
                    //Html se ocupa para crear una tabla nueva
                    var html = '<table class ="table" >';
                    html += '<tbody>';
                    html += '<tr><th>Rut Medico</th>';
                    html += '<th>Nombre</th>';
                    html += '<th>Fecha Nacimiento</th>';
                    html += '<th>Especialidad</th>';
                    html += '<th>Valor Consulta</th></tr>';
                    jQuery.each(Medicos, function (indice, Medico) {
                        html += '<tr><td>' + Medico["rutMedico"] + '</td><td>' + Medico["nomMedico"] + '</td><td>' + Medico["fechaNac"] + '</td><td>' + Medico["especialidad"] + '</td><td>' + Medico["vConsulta"] + '</td></tr>';
                    });
                    html += '</tbody></table>';
                    jQuery('div.ListarMedicos').html(html);
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
    var rut = jQuery("input[name='rutMedicoL']").val();
    return jQuery.Rut.validar(rut);
}

function quitarFormatoRut() {
    var rut = jQuery("input[name='rutMedicoL']").val();
    var rutSinFormato = jQuery.Rut.quitarFormato(rut);
    document.getElementById('rutMedicoLis').value = rutSinFormato;
}
