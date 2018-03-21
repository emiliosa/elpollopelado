$(document).ready(function() {
    $('#quitarImagen').on('click', function() {
        var id = $('#id').val();
        var _method = $('#_method').val();
        $.ajax({
            type: "POST",
            url: '/get_clientes_info',
            data: data,
            cache: false,
            beforeSend: function (){
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
            id: 'imagen-preview'
        });
    });
});