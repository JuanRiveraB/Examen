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
    jQuery("button[name='Listar']").click(function () {
        jQuery.getJSON("/Examen/FormaA/backend/infoAtencion.php",
                function (Atenciones) {
                    //Html se ocupa para crear una tabla nueva
                    var html = '<table class ="table" >';
                    html += '<tbody>';
                    html += '<tr><th>Numero Atención</th>';
                    html += '<th>Fecha</th>';
                    html += '<th>Rut Paciente</th>';
                    html += '<th>Rut Medico</th>';
                    html += '<th>Estado</th></tr>';
                    jQuery.each(Atenciones, function (indice, Atencion) {
                        html += '<tr><td>' + Atencion["nSecuencial"] + '</td><td>' + Atencion["fecAtencion"] + '</td><td>' + Atencion["rutPersona"] + '</td><td>' + Atencion["rutMedico"] + '</td><td>' + Atencion["estado"] + '</td></tr>';
                    });
                    html += '</tbody></table>';
                    jQuery('div.listarAtenciones').html(html);
                });
    });
});

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