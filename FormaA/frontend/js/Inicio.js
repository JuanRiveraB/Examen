jQuery(document).ready(function () {

    var nivel = document.getElementById('nivel').value;
    switch (nivel.toString().trim()) {
        case 'Administrador':
            document.getElementById('OpAdmin').style.display = 'block';
            break;
        case 'Director':
            document.getElementById('OpDirector').style.display = 'block';
            break;
        case 'Secretaria':
            document.getElementById('OpSecretaria').style.display = 'block';
            break;
        case 'Paciente':
            document.getElementById('OpPaciente').style.display = 'block';
            break;
        default:

            break;
    }
});

