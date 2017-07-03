function validarRut() {
    var rut = jQuery("input[name='rut']").val();
    return jQuery.Rut.validar(rut);
}

function volver() {
    window.location.href = 'formulario.php';
}


