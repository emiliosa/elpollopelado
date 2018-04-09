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

/**
 * @param {String} url
 * @param {Object} data
 * @param {String} type
 */
function ajaxCliente(url, data, type) {
    $.ajax({
        type: type,
        url: url,
        data: data,
        dataType: 'JSON',
        beforeSend: function() {
            $('.loading').show();
        }
    }).done(function(response) {
        //if (response.success) {
        window.location = response.url;
        //} else {
        //location.reload();
        //}
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('error: ' + errorThrown);
    }).always(function(jqXHR, textStatus, errorThrown) {
        $('.loading').hide();
    });
}

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
        e.preventDefault();
        if ($(this).valid()) {

            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var token = $("input[name='_token']").val();
            var _method = $("input[name='_method']").val();
            var data = $(this).serialize();
            var cliente_id = $("#cliente_id").val();
            var data_form = {};
            var data_descuentos = {};
            var data_direcciones = {};
            var tipo_identificacion_id = $('#tipo_identificacion_id option:selected').val();
            var tipo_cliente_id = $('#tipo_cliente_id option:selected').val();
            var identificacion = $('#identificacion').val();
            var razon_social = $('#razon_social').val();
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var email = $('#email').val();
            var telefono_celular = $('#telefono_celular').val();
            var telefono_fijo = $('#telefono_fijo').val();
            var table_descuentos_rows = $('#table_descuentos tbody tr');
            var table_direcciones_rows = $('#table_direcciones tbody tr');
            $.each(table_descuentos_rows, function(index, row) {
                var descuento_id = $(row).attr('data-id');
                var obj = Object.keys(data_descuentos).length != 0 ? JSON.parse(data_descuentos) : [];
                if (descuento_id != -1) {
                    obj.push({
                        'descuento_id': descuento_id
                    });
                    data_descuentos = JSON.stringify(obj);
                }
            });
            $.each(table_direcciones_rows, function(index, row) {
                var direccion_id = $(row).attr('data-id');
                var td = $(row).children('td');
                var localidad_id = $(td[2]).attr('data-id');
                var calle = $(td[3]).text();
                var altura = $(td[4]).text();
                var piso = $(td[5]).text();
                var dpto = $(td[6]).text();
                var entrecalles = $(td[7]).text();
                var obj = Object.keys(data_direcciones).length != 0 ? JSON.parse(data_direcciones) : [];
                if (direccion_id != -1) {
                    obj.push({
                        'id': direccion_id,
                        'localidad_id': localidad_id,
                        'calle': calle,
                        'altura': altura,
                        'piso': piso,
                        'dpto': dpto,
                        'entrecalles': entrecalles
                    });
                    data_direcciones = JSON.stringify(obj);
                }
            });
            data_form = {
                '_method': _method,
                'token': token,
                'cliente_id': cliente_id,
                'tipo_identificacion_id': tipo_identificacion_id,
                'tipo_cliente_id': tipo_cliente_id,
                'identificacion': identificacion,
                'razon_social': razon_social,
                'nombre': nombre,
                'apellido': apellido,
                'email': email,
                'telefono_celular': telefono_celular,
                'telefono_fijo': telefono_fijo,
                'descuentos': data_descuentos,
                'direcciones': data_direcciones
            };
            //console.log(data);
            //console.log(data_form);
            ajaxCliente(url, data_form, method);
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
