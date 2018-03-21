$(document).ready(function () {

    var token = $("input[name='_token']").val();
    fill_provincias();

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
            beforeSend: function (){
                $('.loading').show();
            }
        }).done(function (response) {
            $.each(response, function (i, val) {
                $("select[name='" + id + "']").append("<option value='" + val.id + "'>" + val.nombre + "</option>");
            });
            $('.loading').hide();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        }).always(function(jqXHR, textStatus, errorThrown) {
            $('.loading').hide();
        });
    }

    function fill_provincias() {
        ajax("/get_provincias", "provincia_id", null);
    }

    function fill_partidos(provincia_id) {
        $("#partido_id").find('option').not(':first').remove();
        $("#localidad_id").find('option').not(':first').remove();
        if (provincia_id) {
            var data = {provincia_id: provincia_id, _token: token};
            ajax("/get_partidos_por_provincia", "partido_id", data);
        }
    }

    function fill_localidades(partido_id) {
        $("#localidad_id").find('option').not(':first').remove();
        if (partido_id) {
            var data = {partido_id: partido_id, _token: token};
            ajax("/get_localidades_por_partido", "localidad_id", data);
        }
    }

    $("select[name='provincia_id']").on('change', function () {
        fill_partidos($(this).val());
    });

    $("select[name='partido_id']").on('change', function () {
        fill_localidades($(this).val());
    });

    $('#btn_abrir_direccion').on('click', function (e) {
        e.preventDefault();
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
        $('#direccion_modal').modal('show');
    });
    
    //evento delegado por agregar row dinámico
    $(document).on('click', '.btn-borrar-direccion', function (e) {
        e.preventDefault();
        var direccion_id = $(this).closest('tr').attr('data-id');
        $('#direccion_id_borrar').val(direccion_id);
        $('#modal_direccion_confirmacion').modal('show');
    });

    $('#btn_modal_borrar_direccion').on('click', function (e) {
        var direccion_id = $('#direccion_id_borrar').val();
        $('#table_direcciones tbody tr[data-id="' + direccion_id + '"]').remove();
        $("#modal_direccion_confirmacion").modal('hide');
    });

    $('#direccion_modal').on('hidden.bs.modal', function (event) {
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

    $('#btn_agregar_direccion').on('click', function (e) {
        e.preventDefault();
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
        $('#table_direcciones tbody').append(row);
        $('#direccion_modal').modal('hide');
    });

    $('.btn-submit-direccion').on('click', function(e){
        $("form[name='direccion_modal_form']").submit();
    });

    $("form[name='direccion_modal_form']").validate({
        submitHandler: function(form) {
            console.log('submitHandler');
            return false;
        }
    });

});