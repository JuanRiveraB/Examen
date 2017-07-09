jQuery(document).ready(function () {
    /**
     * Manejo del campo RUT
     */
    jQuery("input[name='rutPaciente']").Rut({format_on: 'keyup'});
    jQuery("input[name='rutPaciente']").blur(function () {
        if (this.value !== "") {

            if (!validarRutPaciente()) {
                jQuery(this).addClass("error");
                alert('El rut ingresado no esta correcto');
            } else {
                jQuery(this).removeClass("error");
            }
        }
    });
    jQuery.getJSON("/Examen/FormaA/backend/infoMedico.php",
            function (Medicos) {
                jQuery("select[name='Medico'] option").remove();
                jQuery("select[name='Medico']").append("<option value=\"\">Seleccione un Medico</option>");
                jQuery.each(Medicos, function (indice, medico) {
                    jQuery("select[name='Medico']").append("<option value=\"" + medico["rutMedico"] + "\">" + medico["nomMedico"] + " ~ Especialidad: " + medico["especialidad"] + " ~ Valor: " + medico["vConsulta"] + "</option>");
                });
            });

    jQuery("input[name='NSecu']").blur(function () {
        mostrarImagenCargando();
        jQuery.getJSON("/Examen/FormaA/backend/infoAtencion.php",
                {id: this.value},
                function (atencion) {
                    jQuery("input[name='rutPacienteCE']").val(atencion[0].rutPersona);
                    jQuery("input[name='rutPacienteCE']").attr("readonly", true);
                    jQuery("input[name='FechaAtenCE']").val(atencion[0].fecAtencion);
                    jQuery("input[name='FechaAtenCE']").attr("readonly", true);
                    jQuery.getJSON("/Examen/FormaA/backend/infoMedico.php",
                            {id: atencion[0].rutMedico},
                            function (medico) {
                                jQuery("input[name='rutMedicoCE']").val(medico.rutMedico);
                                jQuery("input[name='rutMedicoCE']").attr("readonly", true);
                                jQuery("input[name='MedicoCE']").val(medico.nomMedico);
                                jQuery("input[name='MedicoCE']").attr("readonly", true);
                                ocultarImagenCargando();
                            });
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
    var rut = jQuery("input[name='rutPaciente']").val();

    return jQuery.Rut.validar(rut);
}

function quitarFormatoRutAgendar() {
    var rut1 = jQuery("input[name='rutPaciente']").val();
    var rutSinFormato1 = jQuery.Rut.quitarFormato(rut1);
    document.getElementById('rutP').value = rutSinFormato1;
    if (validar_formulario() === true) {
        document.getElementById("frmAgendar").submit();
    }
}

function agendar() {
    document.getElementById('cEstado').style.display = 'none';
    document.getElementById('Agendar').style.display = 'block';
}

function cEstado() {
    document.getElementById('Agendar').style.display = 'none';
    document.getElementById('cEstado').style.display = 'block';
}

function validar_formulario() {
    var fecha = jQuery("input[name='FechaAten']").val();
    var rutPaciente = jQuery("input[name='rutPaciente']").val();
    var rutMedico = jQuery("input[name='Medico']").val();
    var estado = jQuery("input[name='sEstado']").val();
    if (fecha.toString().trim() === "" || rutPaciente.toString().trim() === "" || rutMedico.toString().trim() === "" || estado.toString().trim() === "")
    {
        alert("No puede tener campos vacios");
        return false;
    } else {
        return true;
    }
}

function cambiarEstado() {
    if (validar_formularioCambiar() === true) {
        document.getElementById("frmAgendar").submit();
    }
}

function validar_formularioCambiar() {
    var nsecu = jQuery("input[name='NSecu']").val();
    var estado = jQuery("input[name='sEstadoCE']").val();
    if (nsecu.toString().trim() === "" || estado.toString().trim() === "")
    {
        alert("No puede tener campos vacios");
        return false;
    } else {
        return true;
    }
}

