$(document).ready(function() {
    /**
     * @param {String} url
     * @param {Object} data
     * @param {String} type
     */
    function ajax(url, data, type) {
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

    $('.btn-submit-edit').on('click', function(e){
        $("form[name='cliente_form']").submit();
    });

    $("form[name='cliente_form']").on('submit', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var token = $("input[name='_token']").val();
        var _method = $("input[name='_method']").val();
        var data = $(this).serialize();
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
            obj.push({
                'descuento_id': descuento_id
            });
            data_descuentos = JSON.stringify(obj);
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
        });
        data_form = {
            '_method': _method,
            'token': token,
            'tipo_identificacion_id': tipo_identificacion_id,
            'tipo_cliente_id': tipo_cliente_id,
            'identificacion': identificacion,
            'razon_social': razon_social,
            'nombre': nombre,
            'apellido': apellido,
            'email': email,
            'telefono_celular': telefono_celular,
            'telefono_fijo': telefono_fijo,
            'descuentos': Object.keys(data_descuentos).length != 0 ? data_descuentos : null,
            'direcciones': Object.keys(data_direcciones).length != 0 ? data_direcciones : null
        };
        //console.log(data);
        //console.log(data_form);
        ajax(url, data_form, method);
    });
});