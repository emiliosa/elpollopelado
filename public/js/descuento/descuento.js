$(document).ready(function () {

    /**
     * @param {Link} url
     * @param {HTMLSelect} id
     * @param {Object} data
     */
    function ajax(url, id, data) {
        $.ajax({
            type: "GET",
            url: url,
            data: data
        })
        .done(function (response) {
            $.each(response, function (i, val) {
                $("select[name='" + id + "']").append("<option value='" + val.id + "'>" + val.porcentaje + "</option>");
            });
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        });
    }

    function fillDescuentos() {
        ajax("/get_descuentos", "descuento_id", null);
    }
    
    var token = $("input[name='_token']").val();
    fillDescuentos();

    $('#btn_agregar_descuento').click(function () {
        $('#btn_submit_descuento').data('op', 'add');
        $('#btn_submit_descuento').val('Agregar');
        $('#descuentoModal').modal('show');
    });

    $(document).on('click', '#btn_modificar_descuento', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var data = {id: id, _token: token};
        $('#btn_submit_descuento').data('op', 'update');
        $('#btn_submit_descuento').val('Actualizar');
        $('#descuento_por_cliente_id').val(id);
        $.ajax({
            type: "GET",
            url: '/get_descuento_por_cliente',
            data: data,
            cache: false
        })
        .done(function (response) {
            $("#descuento_id").val(response.descuento_id);
            $('#descuentoModal').modal('show');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        });
    });

    $(document).on('click', '#btn_borrar_descuento', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var data = {id: id, _token: token};
        if (confirm('Desea eliminar el descuento seleccionado?')){
            $.ajax({
                type: "DELETE",
                url: '/descuento_por_cliente/' + id,
                data: data,
                cache: false
            })
            .done(function (response) {
                location.reload();
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log('error: ' + textStatus);
            });
        }
    });

    $('#descuentoModal').on('hidden.bs.modal', function (event) {
        $("#descuento_id").val("");
    });

    $('#btn_submit_descuento').click(function (e) {
        e.preventDefault();
        var op = $('#btn_submit_descuento').data('op');
        switch (op) {
            case 'add':
                $('#descuento_form_modal').submit();
                break;
            case 'update':
                var id = $('#descuento_por_cliente_id').val();
                var url = '/descuento_por_cliente/' + id;
                var data = $('#descuento_form_modal').serializeArray();
                data.push({name: 'method', value: "PATCH"});
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: $.param(data)
                })
                .done(function (response) {
                    location.reload();
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.log('error: ' + textStatus);
                });
                break;
        }
    });
});