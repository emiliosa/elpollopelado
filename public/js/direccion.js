$(document).ready(function () {

    var token = $("input[name='_token']").val();
    fillProvincias();

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

    $("select[name='provincia_id']").on('change', function () {
        fillPartidos($(this).val());
    });

    $("select[name='partido_id']").on('change', function () {
        fillLocalidades($(this).val());
    });

    $('#btn_agregar_direccion').on('click', function () {
        $('#btn_submit_direccion').data('op', 'add');
        $('#btn_submit_direccion').val('Agregar');
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
        $('#modal_direccion').modal('show');
    });
    /*
    $("#dialog-confirm").dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            Cancel: function() {
                $(this).dialog("close");
            },
            "Desea eliminar la dirección seleccionada?": function() {
                var id = $('#btn_borrar_direccion').data('id');
                var data = {id: id, _token: token};
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
                $(this).dialog("close");
            }
        }
    });
    */

    $('#btn_borrar_direccion').on('click', function (e) {
        $('#modal_direccion_confirmacion').modal('show');
    });

    $('#btn_modal_borrar_direccion').on('click', function (e) {
        var id = $('#btn_borrar_direccion').data('id');
        var data = {id: id, _token: token};
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
    });

    //$('#btn_submit_direccion').on('click', function (e) {
    $('#btn_submit_direccion').on('submit', function (e) {
        //e.preventDefault();
        //if ($('#form_modal_direccion')[0].checkValidity()) {
        if (!this.checkValidity()) {
            return false;
        } else {
            var op = $('#btn_submit_direccion').data('op');
            switch (op) {
                case 'add':
                    return true;
                    break;
                case 'update':
                    var id = $('#direccion_id').val();
                    var url = '/direccion/' + id;
                    var data = $('#form_modal_direccion').serializeArray();
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
        }
    });

    //$('#btn_modificar_direccion').on('click', function (e) {
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
            $('#modal_direccion').modal('show');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('error: ' + textStatus);
        });
    });

    //$('#btn_borrar_direccion').on('click', function (e) {
    $(document).on('click', '#btn_borrar_direccion', function (e) {
        //e.preventDefault();
        $("#modal_direccion_confirmacion").modal('show');
    });

    $('#modal_direccion').on('hidden.bs.modal', function (event) {
        $("#provincia_id").val("");
        $("#partido_id").find('option').not(':first').remove();
        $("#localidad_id").find('option').not(':first').remove();
        $("#calle").val("");
        $("#altura").val("");
        $("#piso").val("");
        $("#dpto").val("");
        $("#entrecalles").val("");
    });

});