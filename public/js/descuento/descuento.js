$(document).ready(function() {

    /**
     * @param {Link} url
     * @param {HTMLSelect} id
     * @param {Object} data
     */
    function ajax(url, id, data) {
        $.ajax({
            type: "GET",
            url: url,
            data: data,
            beforeSend: function() {
                $('.loading').show();
            }
        }).done(function(response) {
            $.each(response, function(i, val) {
                $("select[name='" + id + "']").append("<option value='" + val.id + "'>" + val.porcentaje + "</option>");
            });
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('.loading').hide();
        });
    }

    function fill_descuentos() {
        ajax("/get_descuentos", "descuento_id", null);
    }

    var token = $("input[name='_token']").val();
    fill_descuentos();

    $('#btn_abrir_descuento').on('click', function(e) {
        e.preventDefault();
        $('#descuento_modal').modal('show');
    });

    //evento delegado por agregar row dinámico
    $(document).on('click', '.btn-borrar-descuento', function(e) {
        e.preventDefault();
        var descuento_id = $(this).closest('tr').attr('data-id');
        $('#descuento_id_borrar').val(descuento_id);
        $("#modal_descuento_confirmacion").modal('show');
    });

    $('#btn_modal_borrar_descuento').on('click', function(e) {
        var descuento_id = $('#descuento_id_borrar').val();
        $('#table_descuentos tbody tr[data-id="' + descuento_id + '"]').remove();
        $("#modal_descuento_confirmacion").modal('hide');
    });

    $('#descuento_modal').on('hidden.bs.modal', function(event) {
        $("#descuento_id").val("");
    });

    $('.btn-submit-descuento').on('click', function(e) {
        $("form[name='descuento_modal_form']").submit();
    });

    $('.btn-submit-descuento').on('click', function(e){
        $("form[name='descuento_modal_form']").submit();
    });

    $("form[name='descuento_modal_form']").validate({
        rules: {
            name: 
        },
        submitHandler: function(form) {
            var descuento_id = $('#descuento_id option:selected').val();
            var descuento = $('#descuento_id option:selected').text();
            var row = '<tr data-id="' + descuento_id + '">' + '<td class="text-center">% ' + descuento + '</td>' + '<td class="text-center">' + '<button class="btn btn-danger btn-xs btn-borrar-descuento" title="Borrar descuento">' + '<i class="fa fa-remove" aria-hidden="true"></i>' + '</button>' + '</td>' + '</tr>';
            $('#table_descuentos tbody').append(row);
            $('#descuento_modal').modal('hide');
            return false;
        }
    });

});