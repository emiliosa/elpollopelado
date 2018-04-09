var token = $("input[name='_token']").val();
var direccionRules = {
    provincia_id: {
        required: true
    },
    partido_id: {
        required: true
    },
    localidad_id: {
        required: true
    },
    calle: {
        required: true
    },
    altura: {
        required: true,
        number: true
    },
    entrecalles: {
        required: true
    }
};

/**
 * @param {Link} url
 * @param {HTMLSelect} id
 * @param {Object} data
 */
function ajaxDireccion(url, id, data) {
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        beforeSend: function() {
            $('.loading').show();
        }
    }).done(function(response) {
        $.each(response, function(i, val) {
            $("select[name='" + id + "']").append("<option value='" + val.id + "'>" + val.nombre + "</option>");
        });
        $('.loading').hide();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('error: ' + textStatus);
    }).always(function(jqXHR, textStatus, errorThrown) {
        $('.loading').hide();
    });
}

function fillProvincias() {
    ajaxDireccion("/get_provincias", "provincia_id", null);
}

function fillPartidos(provincia_id) {
    $("#partido_id").find('option').not(':first').remove();
    $("#localidad_id").find('option').not(':first').remove();
    if (provincia_id) {
        var data = {
            provincia_id: provincia_id,
            _token: token
        };
        ajaxDireccion("/get_partidos_por_provincia", "partido_id", data);
    }
}

function fillLocalidades(partido_id) {
    $("#localidad_id").find('option').not(':first').remove();
    if (partido_id) {
        var data = {
            partido_id: partido_id,
            _token: token
        };
        ajaxDireccion("/get_localidades_por_partido", "localidad_id", data);
    }
}

function initSelectDireccion() {
    $("select[name='provincia_id']").on('change', function() {
        fillPartidos($(this).val());
    });

    $("select[name='partido_id']").on('change', function() {
        fillLocalidades($(this).val());
    });

    $("select[name='provincia_id']").select2({
        dropdownParent: $("#direccion_modal")
    });

    $("select[name='partido_id']").select2({
        dropdownParent: $("#direccion_modal")
    });
    $("select[name='localidad_id']").select2({
        dropdownParent: $("#direccion_modal")
    });
}

function initTableDireccion() {
    $('.btn-abrir-modal-direccion').on('click', function(e) {
        e.preventDefault();
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
        $('#direccion_modal').modal('show');
    });

    //evento delegado por agregar row dinámico
    $(document).on('click', '.btn-borrar-direccion', function(e) {
        e.preventDefault();
        var direccion_id = $(this).closest('tr').attr('data-id');
        $('#direccion_id_borrar').val(direccion_id);
        $('#modal_direccion_confirmacion').modal('show');
    });
}

function initModalDireccion() {
    $('#direccion_modal').on('hidden.bs.modal', function(event) {
        $("#direccion_id").val("");
        $("#provincia_id").val("");
        $("#partido_id").find('option').not(':first').remove();
        $("#localidad_id").find('option').not(':first').remove();
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
    });

    $('.btn-agregar-direccion').on('click', function(e) {
        var formDireccion = $("form[name='direccion_modal_form']");
        e.preventDefault();
        if (formDireccion.valid()) {

            var direccion_id = $('#direccion_id').val();
            var provincia_id = $('#provincia_id option:selected').val();
            var provincia = $('#provincia_id option:selected').text();
            var partido_id = $('#partido_id option:selected').val();
            var partido = $('#partido_id option:selected').text();
            var localidad_id = $('#localidad_id option:selected').val();
            var localidad = $('#localidad_id option:selected').text();
            var calle = $('#calle').val();
            var altura = $('#altura').val();
            var piso = $('#piso').val();
            var dpto = $('#dpto').val();
            var entrecalles = $('#entrecalles').val();
            var row =
                '<tr data-id="' + direccion_id + '">' +
                '<td class="text-left" data-id="' + provincia_id + '">' + provincia + '</td>' +
                '<td class="text-left" data-id="' + partido_id + '">' + partido + '</td>' +
                '<td class="text-left" data-id="' + localidad_id + '">' + localidad + '</td>' +
                '<td class="text-left">' + calle + '</td>' +
                '<td class="text-center">' + altura + '</td>' +
                '<td class="text-center">' + piso + '</td>' +
                '<td class="text-center">' + dpto + '</td>' +
                '<td class="text-left">' + entrecalles + '</td>' +
                '<td class="text-center">' +
                '<button class="btn btn-danger btn-xs btn-borrar-direccion" title="Borrar direccion">' +
                '<i class="fa fa-remove" aria-hidden="true"></i>' +
                '</button>' +
                '</td>' +
                '</tr>';
            $('#table_direcciones tbody tr[data-id=-1]').addClass('hidden'); //ocultar
            $('#table_direcciones tbody').append(row);
            $('#direccion_modal').modal('hide');

        }
    });

    $('.btn-modal-borrar-direccion').on('click', function(e) {
        var direccion_id = $('#direccion_id_borrar').val();

        $('#table_direcciones tbody tr[data-id="' + direccion_id + '"]').remove();
        if ($('#table_direcciones tbody tr').length == 1) {
            $('#table_direcciones tbody tr[data-id=-1]').removeClass('hidden'); //mostrar
        }
        $("#modal_direccion_confirmacion").modal('hide');
    });
}

function initFormDireccion() {
    $("form[name='direccion_modal_form']").validate({
        lang: 'es'
    });

    /*$('.btn-submit-direccion').on('click', function(e){
        $("form[name='direccion_modal_form']").submit();
    });*/
}

$(document).ready(function() {

    initSelectDireccion();
    initTableDireccion();
    initModalDireccion();
    initFormDireccion();

    fillProvincias();

    addRules(direccionRules);
});
