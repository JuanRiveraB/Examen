jQuery(document).ready(function () {
    /**
     * Manejo del campo RUT
     */
    jQuery("input[name='rut']").Rut({format_on: 'keyup'});
    jQuery("input[name='rut']").blur(function () {
        if (this.value !== "") {

            if (!validarRut()) {
                jQuery(this).addClass("error");
                alert('El rut ingresado no esta correcto');
            } else {
                jQuery(this).removeClass("error");
            }

            var rutSinFormato = jQuery.Rut.quitarFormato(this.value);

            jQuery.getJSON("/DAI-P3/Solemne3/backend/infoCliente.php",
                    {id: rutSinFormato},
                    function (titular) {
                        if (edad(titular.fecNac) === true) {
                            jQuery("input[name='nombre']").val(titular.nombrePersona);
                            jQuery("input[name='nombre']").attr("readonly", true);

                            jQuery("input[name='apellido']").val(titular.apellidoPersona);
                            jQuery("input[name='apellido']").attr("readonly", true);
                        } else {
                            alert('Es menor de Edad');
                            return;
                        }
                    });
            jQuery.getJSON("/DAI-P3/Solemne3/backend/infoCargas.php",
                    {id: rutSinFormato},
                    function (cargas) {
                            jQuery("select[name='beneficiarios'] option").remove();
                            jQuery("select[name='beneficiarios']").append("<option value=\"\">-- Seleccione el beneficiario --</option>");
                            
                        jQuery.each(cargas, function (indice, carga) {
                            var nombreCompleto = carga["nombrePersona"] + " " + carga["apellidoPersona"];
                            jQuery("select[name='beneficiarios']").append("<option value=\"" + carga["idPersona"] + "\">" + nombreCompleto + "</option>");
                            ;
                        });
                    });
        }
    });
});

function validarRut() {
    var rut = jQuery("input[name='rut']").val();

    return jQuery.Rut.validar(rut);
}

function volver(){
    window.location.href = 'formulario.php';
}


