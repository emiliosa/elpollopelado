var clienteRules = {
    tipo_identificacion_id: {
        required: true
    },
    tipo_cliente_id: {
        required: true
    },
    email: {
        required: true,
        email: true
    },
    telefono_celular: {
        required: true
    },
    telefono_fijo: {
        required: true
    }
};

var personaFisicaRules = {
    nombre: {
        required: true,
        texto: true
    },
    apellido: {
        required: true,
        texto: true
    }
};

var personaJuridicaRules = {
    razon_social: {
        required: true,
        razonSocial: true
    }
};

var cuitRules = {
    identificacion: {
        required: true,
        cuit: true
    }
};

var dniRules = {
    identificacion: {
        required: true
    }
};

function initSelectCliente() {
    $('#tipo_identificacion_id').on('change', function() {
        $('#identificacion').inputmask('remove');
        $('#identificacion').attr('disabled', false);
        switch ($(this).val()) {
            case '1': //CUIL
            case '2': //CUIT
                removeRules(dniRules);
                addRules(cuitRules);
                $('#identificacion').inputmask({
                    mask: "99-99999999-9",
                    placeholder: "_"
                });
                break;
            case '3': //DNI
                removeRules(cuitRules);
                addRules(dniRules);
                $('#identificacion').inputmask({
                    mask: "99999999",
                    placeholder: "_"
                });
                break;
            default:
                $('#identificacion').attr('disabled', true);
        }
    });

    $('#tipo_cliente_id').on('change', function() {
        switch ($(this).val()) {
            case '1': //Persona fisica
                removeRules(personaJuridicaRules);
                addRules(personaFisicaRules);
                $('#razon_social').attr('disabled', true);
                $('#nombre').attr('disabled', false);
                $('#apellido').attr('disabled', false);
                break;
            case '2': //Persona juridica
                removeRules(personaFisicaRules);
                addRules(personaJuridicaRules);
                $('#razon_social').attr('disabled', false);
                $('#nombre').attr('disabled', true);
                $('#apellido').attr('disabled', true);
                break;
            default:
                $('#razon_social').attr('disabled', true);
                $('#nombre').attr('disabled', true);
                $('#apellido').attr('disabled', true);
        }
    });

    $('#tipo_identificacion_id').select2();
    $('#tipo_cliente_id').select2();
}

function initFormCliente() {
    $("form[name='cliente_form']").validate({
        lang: 'es'
    });

    $('.btn-submit').on('click', function(e) {
        e.preventDefault();
        $("form[name='cliente_form']").submit();
    });

    $("form[name='cliente_form']").on('submit', function(e) {
        if ($(this).valid()) {
            return true;
        } else {
            return false;
        }
    });
}

$(document).ready(function() {

    initSelectCliente();
    initFormCliente();

    addRules(clienteRules);

    $('#tipo_identificacion_id').trigger('change');
    $('#tipo_cliente_id').trigger('change');
});
