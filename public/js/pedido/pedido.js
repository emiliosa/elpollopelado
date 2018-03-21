function fillDescuentos(cliente_id) {
    $("#descuento_id").find('option').not(':first').remove();
    if (cliente_id) {
        var data = {
            cliente_id: cliente_id,
            _token: token
        };
        ajax("/get_descuentos_por_cliente", "descuento_id", data);
    }
}
$(document).ready(function() {
    var token = $("input[name='_token']").val();
    $('#clientesModal').on('show.bs.modal', function() {
        console.log('clientesModal');
        $(this).find('.modal-body').css({
            width: 'auto', //probably not needed
            height: 'auto', //probably not needed 
            'max-height': '100%'
        });
    });
    $('#direccionesModal').on('show.bs.modal', function() {
        $(this).find('.modal-body').css({
            width: 'auto', //probably not needed
            height: 'auto', //probably not needed 
            'max-height': '100%'
        });
    });
    $('#btnClientes').on('click', function() {
        var table = $('#table-clientes');
        var row = table.bootstrapTable('getSelections')[0];
        if (row) {
            var data = {
                cliente_id: row.id,
                _token: token
            };
            $('#direccion_envio').val("");
            $.ajax({
                type: "GET",
                url: '/get_clientes_info',
                data: data,
                cache: false
            }).done(function(response) {
                var descuento_id = '';
                if (response.descuentos.length > 0) {
                    descuento_id = response.descuentos[0].id;
                }
                $('#table-direcciones').bootstrapTable('load', response.direcciones);
                $('#cliente_id').val(row.id);
                $('#razon_social').val(row.identificacion + ' - ' + row.razon_social);
                $('#descuento_id').val(descuento_id);
                fillDescuentos(row.id);
                var obj = $('.span-cliente');
                obj.addClass('hidden');
                obj.parent().parent().removeClass('has-error');
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log('error: ' + textStatus);
            }).always(function(jqXHR, textStatus, errorThrown) {
                $('#clientesModal').modal('toggle');
                $('.loading').hide();
            });
        }
    });
    $('#btnDirecciones').on('click', function() {
        var table = $('#table-direcciones');
        var row = table.bootstrapTable('getSelections')[0];
        var direccion = row.calle + ' ' + row.altura + ', ' + row.localidad.nombre + ' ' + row.provincia.nombre;
        if (row) {
            $('#direccionesModal').modal('toggle');
            $.ajax({
                type: "GET",
                url: '/get_distancia',
                data: {
                    direccion: direccion
                },
                cache: false
            }).done(function(response) {
                console.log(response);
                $('#direccion_envio_id').val(row.id);
                $('#direccion_envio').val(direccion);
                var obj = $('.span-direccion');
                obj.addClass('hidden');
                obj.parent().parent().removeClass('has-error');
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log('error: ' + textStatus);
            }).always(function(jqXHR, textStatus, errorThrown) {
                $('.loading').hide();
            });
        }
    });
    $('.quantity').on('change', function() {
        var id = $(this).attr('data-id');
        var data = {
            'quantity': this.value
        };
        $.ajax({
            type: "PATCH",
            url: '/cart/' + id,
            data: data
        }).done(function(data) {
            $('#subtotal').html('$ ' + data.cart.subtotal);
            $('#total').html('$ ' + data.cart.total);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('.loading').hide();
        });
    });
    $('.btn-quitar-producto').on('click', function() {
        var id = $(this).attr('data-id');
        var idTr = '#' + $(this).parent().parent().attr('id');
        var productosTableLenth = $('#table-cart tbody tr').length;
        var data = {
            _method: 'DELETE'
        };
        $.ajax({
            type: "POST",
            url: '/cart/' + id,
            data: data
        }).done(function(data) {
            if (data.success) {
                $('#subtotal').html('$ ' + data.cart.subtotal);
                $('#total').html('$ ' + data.cart.total);
                $(idTr).remove();
                if (productosTableLenth == 2) {
                    $('#tr0').removeClass('hidden');
                }
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('.loading').hide();
        });
    });
    $('form').on('submit', function() {
        var productosTableLenth = $('#table-cart tbody tr').length;
        var clienteTableLenth = $('#table-clientes').bootstrapTable('getSelections').length;
        var direccionTableLenth = $('#table-direcciones').bootstrapTable('getSelections').length;
        var result, obj;
        if (clienteTableLenth == 0) {
            obj = $('.span-cliente');
            obj.removeClass('hidden');
            obj.parent().parent().addClass('has-error');
            result = false;
        } else if (direccionTableLenth == 0) {
            obj = $('.span-direccion');
            obj.removeClass('hidden');
            obj.parent().parent().addClass('has-error');
            result = false;
        } else if (productosTableLenth == 1) {
            obj = $('.span-producto');
            obj.removeClass('hidden');
            obj.parent().addClass('has-error');
            result = false;
        } else if (!$(this).valid()) {
            obj = $('.span-fecha-envio');
            obj.removeClass('hidden');
            obj.parent().parent().addClass('has-error');
            obj = $('.span-descuento');
            obj.removeClass('hidden');
            obj.parent().parent().addClass('has-error');
            result = false;
        } else {
            result = true;
        }
        return result;
    });
});