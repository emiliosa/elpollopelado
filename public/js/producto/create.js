var productoRules = {
    categoria_id: {
        required: true
    },
    descripcion: {
        required: true
    },
    moneda_id: {
        required: true
    },
    precio_unitario: {
        required: true
    },
    stock: {
        required: true
    }
};

function initInputProducto() {
    $("select[name='moneda_id']").on('change', function() {
        if ($(this).val() != '') {
            var simbolo = $('option:selected', this).attr('data-simbolo');
            $("#precio_unitario").removeClass('disabled');
            $('#precio_unitario').attr('disabled', false);
            $("#precio_unitario").maskMoney('destroy').maskMoney({
                thousands: ' ',
                decimal: ',',
                allowZero: false,
                selectAllOnFocus: true,
                prefix: simbolo + ' '
            });
            $('#precio_unitario').trigger('focus');
        } else {
            $('#precio_unitario').attr('disabled', true);
        }
    });
    $("select[name='categoria_id']").select2();
    $("select[name='moneda_id']").select2();

    $("select[name='moneda_id']").trigger('change');
}

function initImagenActions() {
    $('#quitarImagen').on('click', function() {
        var id = $('#id').val();
        var _method = $('#_method').val();
        $.ajax({
            type: "POST",
            url: '/get_clientes_info',
            data: data,
            cache: false,
            beforeSend: function() {
                $('.loading').show();
            }
        }).done(function(response) {
            var descuento_id = '';
            if (response.descuentos.length > 0) {
                descuento_id = response.descuentos[0].id;
            }
            $('#tableDirecciones').bootstrapTable('load', response.direcciones);
            $('#cliente_id').val(row.id);
            $('#razon_social').val(row.identificacion + ' - ' + row.razon_social);
            $('#descuento_id').val(descuento_id);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('#imagen').val("");
            $('.loading').hide();
        });
    });
    $("#imagen").change(function() {
        readURL(this, {
            id: 'imagen_preview'
        });
    });
}

function initFormProducto() {
    $("form[name='producto_form']").validate({
        lang: 'es'
    });

    $('.btn-submit').on('click', function(e) {
        e.preventDefault();
        $("form[name='producto_form']").submit();
    });

    $("form[name='producto_form']").on('submit', function(e) {
        if ($(this).valid()) {
            var precio = $("#precio_unitario").maskMoney('unmasked')[0];
            $("#precio_unitario").val(precio);
            return true;
        } else {
            return false;
        }
    });
}

$(document).ready(function() {
    initInputProducto();
    initImagenActions();
    initFormProducto();

    addRules(productoRules);
});
