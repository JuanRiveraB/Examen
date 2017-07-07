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

    jQuery("input[name='rutMedico']").Rut({format_on: 'keyup'});
    jQuery("input[name='rutMedico']").blur(function () {
        if (this.value !== "") {

            if (!validarRutMedico()) {
                jQuery(this).addClass("error");
                alert('El rut ingresado no esta correcto');
            } else {
                jQuery(this).removeClass("error");
            }
            var rutSinFormato = jQuery.Rut.quitarFormato(this.value);

            jQuery.getJSON("/Examen/FormaA/backend/infoMedico.php",
                    {id: rutSinFormato},
                    function (Medico) {
                        jQuery("input[name='nombre']").val(Medico.nomMedico);
                        jQuery("input[name='nombre']").attr("readonly", true);

                        jQuery("input[name='valor']").val(Medico.vConsulta);
                        jQuery("input[name='valor']").attr("readonly", true);
                    });
        }
    });
});

function validarRutPaciente() {
    var rut = jQuery("input[name='rutPaciente']").val();

    return jQuery.Rut.validar(rut);
}

function validarRutMedico() {
    var rut = jQuery("input[name='rutMedico']").val();

    return jQuery.Rut.validar(rut);
}

function quitarFormatoRut() {
    var rut = jQuery("input[name='rutPaciente']").val();
    var rutSinFormato = jQuery.Rut.quitarFormato(rut);
    document.getElementById('rut').value = rutSinFormato;
    document.getElementById("frmLogin").submit();
    ;
}

function agendar() {
    document.getElementById('cEstado').style.display = 'none';
    document.getElementById('Agendar').style.display = 'block';
}

function cEstado() {
    document.getElementById('Agendar').style.display = 'none';
    document.getElementById('cEstado').style.display = 'block';
}

