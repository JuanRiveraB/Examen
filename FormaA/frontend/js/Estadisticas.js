//SELECT count(*),SUM(VALOR_CONSULTA) from atencion join medico on (RUT_MEDICO=Medico_rut);
//SELECT count(*),SUM(VALOR_CONSULTA) from atencion join medico on (RUT_MEDICO=Medico_rut) WHERE FECHA_ATENCION BETWEEN '2017-04-24' and '2017-08-24'; 
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
    jQuery("button[name='btngenerar3']").click(function () {
        jQuery('div.especalidad').show();
        mostrarImagenCargando();
        jQuery.getJSON("/Examen/FormaA/backend/EstadisticaPorFecha.php",
                function (estadistica3) {
                    //Html se ocupa para crear una tabla nueva
                    var html = '<table class ="table" >';
                    html += '<tbody>';
                    html += '<tr><th>Especialidad</th>';
                    html += '<th>Cantidad de atenciones</th>';
                    html += '<th>Valor total  de las atenciones</th>';
                    jQuery.each(estadistica3, function (indice, estadisticas3) {
                        html += '<tr><td>' + estadisticas3[0] + '</td><td>' + estadisticas3[1] + '</td><td>' + estadisticas3[2] + '</td></tr>';
                    });
                    html += '</tbody></table>';
                    jQuery('div.especalidad').html(html);
                    jQuery('div.medico').hide();
                    jQuery('div.estado').hide();
                    ocultarImagenCargando();
                });
    });
    jQuery("button[name='btngenerar4']").click(function () {
        jQuery('div.medico').show();
        mostrarImagenCargando();
        jQuery.getJSON("/Examen/FormaA/backend/EstaditicasPorMedico.php",
                function (estadistica4) {
                    //Html se ocupa para crear una tabla nueva
                    var html = '<table class ="table" >';
                    html += '<tbody>';
                    html += '<tr><th>Medico</th>';
                    html += '<th>Cantidad de atenciones</th>';
                    html += '<th>Valor total  de las atenciones</th>';
                    jQuery.each(estadistica4, function (indice, estadisticas4) {
                        html += '<tr><td>' + estadisticas4[0] + '</td><td>' + estadisticas4[1] + '</td><td>' + estadisticas4[2] + '</td></tr>';
                    });
                    html += '</tbody></table>';
                    jQuery('div.medico').html(html);
                    jQuery('div.especalidad').hide();
                    jQuery('div.estado').hide();
                    ocultarImagenCargando();
                });
    });
    jQuery("button[name='btngenerar5']").click(function () {
        jQuery('div.estado').show();
        mostrarImagenCargando();
        jQuery.getJSON("/Examen/FormaA/backend/EstadisticasPorEstado.php",
                function (estadistica5) {
                    //Html se ocupa para crear una tabla nueva
                    var html = '<table class ="table" >';
                    html += '<tbody>';
                    html += '<tr><th>Estado</th>';
                    html += '<th>Cantidad de atenciones</th>';
                    html += '<th>Valor total  de las atenciones</th>';
                    jQuery.each(estadistica5, function (indice, estadisticas5) {
                        html += '<tr><td>' + estadisticas5[0] + '</td><td>' + estadisticas5[1] + '</td><td>' + estadisticas5[2] + '</td></tr>';
                    });
                    html += '</tbody></table>';
                    jQuery('div.estado').html(html);
                    jQuery('div.especalidad').hide();
                    jQuery('div.medico').hide();
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

function genera_tabla() {
    // Obtener la referencia del elemento body
    var body = document.getElementsByTagName("body")[0];

    // Crea un elemento <table> y un elemento <tbody>
    var tabla = document.createElement("table");
    var tblBody = document.createElement("tbody");

    // Crea las celdas
    for (var i = 0; i < 2; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");

        for (var j = 0; j < 2; j++) {
            // Crea un elemento <td> y un nodo de texto, haz que el nodo de
            // texto sea el contenido de <td>, ubica el elemento <td> al final
            // de la hilera de la tabla
            var celda = document.createElement("td");
            var textoCelda = document.createTextNode("celda en la hilera " + i + ", columna " + j);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
    }

    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // appends <table> into <body>
    body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";
    tabla.setAttribute("border", "2");
}