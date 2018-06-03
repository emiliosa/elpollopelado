var token = $("input[name='_token']").val();
var pedidoRules = {
    fecha_envio: {
        required: true,
        //date: true
    },
    cliente_id: {
        required: true
    },
    direccion_envio: {
        required: true
    }
};

/**
 * @param {Link} url
 * @param {HTMLSelect} id
 * @param {Object} data
 */
function ajaxSelect(url, data) {
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        beforeSend: function() {
            $('.loading').removeClass('hidden');
        }
    }).done(function(response) {
        $.each(response.descuentos, function(i, val) {
            $("select[name='descuento_id']").append("<option value='" + val.id + "'>" + val.porcentaje + "</option>");
        });
        $.each(response.direcciones, function(i, val) {
            $("select[name='direccion_envio_id']").append("<option value='" + val.id + "'>" + val.localidad.partido.provincia.nombre + ", " + val.localidad.partido.nombre + ", " + val.localidad.nombre + ", " + val.calle + " " + val.altura + "</option>");
        });
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('error: ' + textStatus);
    }).always(function(jqXHR, textStatus, errorThrown) {
        $('.loading').addClass('hidden');
    });
}

/**
 * @param {Link} url
 * @param {HTMLSelect} id
 * @param {Object} data
 */
 function ajaxPedido(url, data, type) {
     $.ajax({
         type: type,
         url: url,
         data: data,
         dataType: 'JSON',
         beforeSend: function() {
             $('.loading').removeClass('hidden');
         }
     }).done(function(response) {
         if (response.success) {
             window.location = response.url;
         } else {
             console.log(response.msg);
         }
     }).fail(function(jqXHR, textStatus, errorThrown) {
         console.log('error: ' + errorThrown);
     }).always(function(jqXHR, textStatus, errorThrown) {
         $('.loading').addClass('hidden');
     });
 }

function fillDescuentosDirecciones(cliente_id) {
    $("select[name='descuento_id']").find('option').not(':first').remove();
    $("select[name='direccion_envio_id']").find('option').not(':first').remove();
    if (cliente_id) {
        var data = {
            cliente_id: cliente_id,
            _token: token
        };
        ajaxSelect("/get_clientes_info", data);
    }
}

function fillDirecciones(cliente_id) {
    $("select[name='direccion_envio_id']").find('option').not(':first').remove();
    if (cliente_id) {
        var data = {
            cliente_id: cliente_id,
            _token: token
        };
        ajaxSelect("/get_partidos_por_provincia", "direccion_envio_id", data);
    }
}

function getPrecioTotal(){
    //var direccion = $(this).select2('data')[0].text;
    var direccion = $("select[name='direccion_envio_id']").val();
    var descuento = $("select[name='descuento_id']").val();

    //if (direccion != '' || descuento != '') {
        var data = {
            'direccion': direccion,
            'descuento': descuento
        };
        $.ajax({
            type: "GET",
            url: '/get_precio_total',
            data: data,
            beforeSend: function() {
                $('.loading').removeClass('hidden');
            }
        }).done(function(response) {
            $('#costo_descuento').html(response.costoDescuento);
            $('#costo_distancia').html(response.costoDistancia);
            $('#descuento').html('(' + response.descuento + ')');
            $('#distancia').html('(' + response.distancia + ')');
            $('#subtotal').html(response.subtotal);
            $('#total').html(response.total);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('.loading').addClass('hidden');
        });
    //}
}

function initInputPedido() {
    $("select[name='cliente_id']").on('change', function(){
        if ($(this).val() != '') {
            fillDescuentosDirecciones($(this).val());
            $("select[name='descuento_id']").attr('disabled', false);
            $("select[name='direccion_envio_id']").attr('disabled', false);
        } else {
            $("select[name='descuento_id']").attr('disabled', true);
            $("select[name='direccion_envio_id']").attr('disabled', true);
        }

    });

    $("select[name='descuento_id']").on('change', function(){
        getPrecioTotal();
    });

    $("select[name='direccion_envio_id']").on('change', function(){
        getPrecioTotal();
    });

    $("select[name='cliente_id']").select2();
    $("select[name='descuento_id']").select2();
    $("select[name='direccion_envio_id']").select2();
    $("select[name='direccion_envio_id']").trigger('change');
}

function initProducto() {

    //evento delegado por agregar row dinámico
    $(document).on('click', '.btn-quitar-producto', function(e) {
        e.preventDefault();
        var producto_rowid = $(this).closest('tr').attr('data-rowid');

        $('#producto_rowid_quitar').val(producto_rowid);
        $("#modal_producto_confirmacion").modal('show');
    });

    $('.quantity').on('change', function() {
        var rowid = $(this).attr('data-rowid');
        var data = {
            'quantity': this.value
        };

        $.ajax({
            type: "PATCH",
            url: '/cart/' + rowid,
            data: data,
            beforeSend: function() {
                //$('.loading').removeClass('hidden');
            }
        }).done(function(data) {
            //$('#subtotal').html(data.cart.subtotal);
            //$('#total').html(data.cart.total);
            getPrecioTotal();
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            //$('.loading').addClass('hidden');
        });

    });

    $('.btn-modal-quitar-producto').on('click', function(e) {
        var producto_rowid = $('#producto_rowid_quitar').val();
        var data = {
            _method: 'DELETE'
        };

        $.ajax({
            type: "POST",
            url: '/cart/' + producto_rowid,
            data: data,
            beforeSend: function() {
                $('.loading').removeClass('hidden');
            }
        }).done(function(data) {
            if (data.success) {
                $('#subtotal').html('$ ' + data.cart.subtotal);
                $('#total').html('$ ' + data.cart.total);
                $('#table_cart tbody tr[data-rowid="' + producto_rowid + '"]').remove();
                if ($('#table_cart tbody tr').length == 1) {
                    $('#table_cart tbody tr[data-id=-1]').removeClass('hidden'); //mostrar
                }
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('.loading').addClass('hidden');
            $("#modal_producto_confirmacion").modal('hide');
        });

    });
}

function initFormPedido() {
    $("form[name='pedido_form']").validate({
        lang: 'es'
    });
    $('.btn-submit').on('click', function(e) {
        e.preventDefault();
        $("form[name='pedido_form']").submit();
    });
    $("form[name='pedido_form']").on('submit', function(e) {
        var table_cart_length = $('#table_cart tbody tr').length;
        if ($(this).valid()) {
            if (table_cart_length > 0) {

                /*var url = $(this).attr('action');
                var method = $(this).attr('method');
                var token = $("input[name='_token']").val();
                var _method = $("input[name='_method']").val();
                var data_productos = {};
                var table_productos_rows = $('#table_direcciones tbody tr');
                var fecha_envio = $('#fecha_envio').val();
                var cliente_id = $('#cliente_id option:selected').val();
                var descuento_id = $('#descuento_id option:selected').val();
                var direccion_envio_id = $('#direccion_envio_id option:selected').val();

                $.each(table_productos_rows, function(index, row) {
                    var producto_id = $(row).attr('data-id');
                    var obj = Object.keys(data_productos).length != 0 ? JSON.parse(data_productos) : [];
                    if (producto_id != -1) {
                        obj.push({
                            'producto_id': producto_id
                        });
                        data_productos = JSON.stringify(obj);
                    }
                });

                data_form = {
                    '_method': _method,
                    'token': token,
                    'fecha_envio': fecha_envio,
                    'cliente_id': cliente_id,
                    'descuento_id': descuento_id,
                    'direccion_envio_id': direccion_envio_id,
                    'productos': data_productos
                };*/

                return true;

            } else {
                console.log('seleccione productos');
                return false;
            }

        } else {
            return false;
        }

    });
}

$(document).ready(function() {
    initInputPedido();
    initProducto();
    initFormPedido();

    addRules(pedidoRules);

});
