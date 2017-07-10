/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function quitarFormatoRutAgendar() {
    var rut1 = jQuery("input[name='rutPaciente']").val();
    var rutSinFormato1 = jQuery.Rut.quitarFormato(rut1);
    document.getElementById('rutP').value = rutSinFormato1;
    if (validar_formulario() === true) {
        document.getElementById("frmAgendar").submit();
    }
}

function validarRut() {
    var rut = jQuery("input[name='rut']").val();

    return jQuery.Rut.validar(rut);
}

function comprobarClave(){ 
        var clave1 = document.getElementsByName(regitroContraseña).val();
   	var clave2 = document.getElementsByName(confirmContraseña) .val();

   	if (clave1 == clave2){
      	alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo") 
        }else{ 
      	alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo") 
        } 
}

