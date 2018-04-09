/**
 * @param {Link} url
 * @param {HTMLSelect} id
 * @param {Object} data
 */
function ajaxDescuento(url, id, data) {
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

function fillDescuentos() {
    ajaxDescuento("/get_descuentos", "descuento_id", null);
}

function initSelectDescuento() {
    $("select[name='descuento_id']").select2({
        dropdownParent: $("#descuento_modal")
    });
}

function initTableDescuento() {
    $('.btn-abrir-modal-descuento').on('click', function(e) {
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
}

function initModalDescuento() {
    $('#descuento_modal').on('hidden.bs.modal', function(event) {
        $("#descuento_id").val("");
    });

    $('.btn-modal-borrar-descuento').on('click', function(e) {
        var descuento_id = $('#descuento_id_borrar').val();

        $('#table_descuentos tbody tr[data-id="' + descuento_id + '"]').remove();
        if ($('#table_descuentos tbody tr').length == 1) {
            $('#table_descuentos tbody tr[data-id=-1]').removeClass('hidden'); //mostrar
        }
        $("#modal_descuento_confirmacion").modal('hide');
    });

    $('.btn-agregar-descuento').on('click', function(e) {
        e.preventDefault();
        var descuento_id = $('#descuento_id option:selected').val();
        var descuento = $('#descuento_id option:selected').text();
        var row = '<tr data-id="' + descuento_id + '">' + '<td class="text-center">' + descuento + '</td>' + '<td class="text-center">' + '<button class="btn btn-danger btn-xs btn-borrar-descuento" title="Borrar descuento">' + '<i class="fa fa-remove" aria-hidden="true"></i>' + '</button>' + '</td>' + '</tr>';
        $('#table_descuentos tbody tr[data-id=-1]').addClass('hidden'); //ocultar
        $('#table_descuentos tbody').append(row);
        $('#descuento_modal').modal('hide');
    });
}

function initFormDescuento() {}

$(document).ready(function() {

    initSelectDescuento();
    initTableDescuento();
    initModalDescuento();
    initFormDescuento();

    fillDescuentos();
});
