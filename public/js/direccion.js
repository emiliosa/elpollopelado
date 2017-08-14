$(document).ready(function () {

    var token = $("input[name='_token']").val();
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
                $("select[name='" + id + "']").append("<option value='" + val.id + "'>" + val.nombre + "</option>");
            });
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        });
    }

    function fillProvincias() {
        ajax("/get_provincias", "provincia_id", null);
    }

    function fillPartidos(provincia_id) {
        $("#partido_id").find('option').not(':first').remove();
        $("#localidad_id").find('option').not(':first').remove();
        if (provincia_id) {
            var data = {provincia_id: provincia_id, _token: token};
            ajax("/get_partidos_por_provincia", "partido_id", data);
        }
    }

    function fillLocalidades(partido_id) {
        $("#localidad_id").find('option').not(':first').remove();
        if (partido_id) {
            var data = {partido_id: partido_id, _token: token};
            ajax("/get_localidades_por_partido", "localidad_id", data);
        }
    }

    fillProvincias();

    $("select[name='provincia_id']").change(function () {
        fillPartidos($(this).val());
    });

    $("select[name='partido_id']").change(function () {
        fillLocalidades($(this).val());
    });

    $('#btn_agregar_direccion').click(function () {
        $('#btn_submit_direccion').data('op', 'add');
        $('#btn_submit_direccion').val('Agregar');
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
        $('#direccionModal').modal('show');
    });

    $(document).on('click', '#btn_modificar_direccion', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var data = {id: id, _token: token};
        $('#btn_submit_direccion').data('op', 'update');
        $('#btn_submit_direccion').val('Actualizar');
        $('#direccion_id').val(id);
        $.ajax({
            type: "GET",
            url: '/get_direccion',
            data: data,
            cache: false
        })
        .done(function (response) {
            $("#partido_id").find('option').not(':first').remove();
            $("#localidad_id").find('option').not(':first').remove();
            for (var i=0 ; i < response.partidos.length ; i++) {
                $("#partido_id").append("<option value='" + response.partidos[i].id + "'>" + response.partidos[i].nombre + "</option>");
            }
            for (var i=0 ; i < response.localidades.length ; i++) {
                $("#localidad_id").append("<option value='" + response.localidades[i].id + "'>" + response.localidades[i].nombre + "</option>");
            }
            $("#provincia_id").val(response.direccion.provincia_id);
            $("#partido_id").val(response.direccion.partido_id);
            $("#localidad_id").val(response.direccion.localidad_id);
            $("#calle").val(response.direccion.calle);
            $("#altura").val(response.direccion.altura);
            $("#piso").val(response.direccion.piso);
            $("#dpto").val(response.direccion.dpto);
            $("#entrecalles").val(response.direccion.entrecalles);
            $('#direccionModal').modal('show');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        });
    });

    $(document).on('click', '#btn_borrar_direccion', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var data = {id: id, _token: token};
        if (confirm('Desea eliminar la dirección seleccionada?')){
            $.ajax({
                type: "DELETE",
                url: '/direccion/' + id,
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

    $('#direccionModal').on('hidden.bs.modal', function (event) {
        $("#provincia_id").val("");
        $("#partido_id").find('option').not(':first').remove();
        $("#localidad_id").find('option').not(':first').remove();
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
    });

    $('#btn_submit_direccion').click(function (e) {
        e.preventDefault();
        var op = $('#btn_submit_direccion').data('op');
        switch (op) {
            case 'add':
                $('#direccion_form_modal').submit();
                break;
            case 'update':
                var id = $('#direccion_id').val();
                var url = '/direccion/' + id;
                var data = $('#direccion_form_modal').serializeArray();
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