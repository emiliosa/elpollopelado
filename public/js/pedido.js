// update and delete events
window.actionEvents = {
    'click .select': function (e, value, row) {
        //$('[data-id=' + row.id + ']').parents('tr').remove();
    },
    'click .remove': function (e, value, row) {
        if (confirm('Are you sure to delete this item?')) {
            $.ajax({
                url: API_URL + row.id,
                type: 'delete',
                success: function () {
                    $table.bootstrapTable('refresh');
                    showAlert('Delete item successful!', 'success');
                },
                error: function () {
                    showAlert('Delete item error!', 'danger');
                }
            })
        }
    }
};

function tableActions (value, row, index) {
    return [
        '<a class="select" href="javascript:" data-id="'+row.id+'" data-descripcion="'+row.descripcion+'" data-toggle="modal" data-target="#VisitorDelete" title="Agregar">',
        '<i class="glyphicon glyphicon-plus"></i>',
        '</a>'
    ].join('');
}

$(document).ready(function () {

    var token = $("input[name='_token']").val();
    
    $('#clientesModal').on('show.bs.modal', function () {
        console.log('clientesModal');
        $(this).find('.modal-body').css({
            width:'auto', //probably not needed
            height:'auto', //probably not needed 
            'max-height':'100%'
        });
    });
    
    $('#direccionesModal').on('show.bs.modal', function () {
        $(this).find('.modal-body').css({
            width:'auto', //probably not needed
            height:'auto', //probably not needed 
            'max-height':'100%'
        });
    });
    
    $('#productosModal').on('show.bs.modal', function () {
        console.log('productosModal');
        $(this).find('.modal-body').css({
            width:'auto', //probably not needed
            height:'auto', //probably not needed 
            'max-height':'100%'
        });
        $('#tableProductos').bootstrapTable('refresh', {
            url: 'http://localhost:8000/get_productos'
        });
    });
    
    $('#btnClientes').on('click', function(){
        var table = $('#tableClientes');
        var row = table.bootstrapTable('getSelections')[0];
        if (row){
            var data = {cliente_id: row.id, _token: token};
            $('#direccion_envio').val("");
            $.ajax({
                type: "GET",
                url: '/get_clientes_info',
                data: data,
                cache: false
            })
            .done(function (response) {
                var descuento_id = '';
                if (response.descuentos.length > 0){
                    descuento_id = response.descuentos[0].id;
                }
                $('#tableDirecciones').bootstrapTable('load', response.direcciones);
                $('#cliente_id').val(row.id);
                $('#razon_social').val(row.identificacion + ' - ' + row.razon_social);
                $('#descuento_id').val(descuento_id);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log('error: ' + textStatus);
            });
            $('#clientesModal').modal('toggle');
        }
    });
    
    $('#btnDirecciones').on('click', function(){
        var table = $('#tableDirecciones');
        var row = table.bootstrapTable('getSelections')[0];
        if (row){
            $('#direccionesModal').modal('toggle');
            $.ajax({
                type: "GET",
                url: '/get_distancia',
                data: {direccion: direccion},
                cache: false
            })
            .done(function (response){
                console.log(response);
                $('#direccion_envio_id').val(row.id);
                $('#direccion_envio').val(direccion);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log('error: ' + textStatus);
            });
        }
    });
    
    $('#btnProductos').on('click', function(){
        var table = $('#tableProductos');
        var row = table.bootstrapTable('getSelections')[0];
        if (row){
            $('#direccion_envio_id').val(row.id);
            $('#direccion_envio').val(row.provincia.nombre + ' - ' + row.partido.nombre + ' - ' + row.localidad.nombre + ' - ' + row.calle + ' - ' + row.altura);
            $('#productosModal').modal('toggle');
        }
    });

    $('.quantity').on('change', function() {
        var id = $(this).attr('data-id')
        var data = {'quantity': this.value};
        $.ajax({
            type: "PATCH",
            url: '/cart/' + id,
            data: data
        })
        .done(function(data) {
            location.reload();
        })
    });


});