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
        }
    });
});
function quitarFormatoRut() {
    var rut = jQuery("input[name='rut']").val();
    var rutSinFormato = jQuery.Rut.quitarFormato(rut);
    document.getElementById('rut').value = rutSinFormato;
    document.getElementById("frmLogin").submit();;
}

function validarRut() {
    var rut = jQuery("input[name='rut']").val();
    return jQuery.Rut.validar(rut);
}

function volver() {
    window.location.href = 'formulario.php';
}


