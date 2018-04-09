<div class="modal fade" id="descuento_modal" tabindex="-1" role="dialog" aria-labelledby="descuento_modal_label" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="descuento_modal_label">Agregar descuento</h4>
            </div>

            {!! Form::open(['route' => 'descuento_por_cliente.store', 'name' => 'descuento_modal_form'] ) !!}

                <div class="modal-body">

                    <div class="form-group">
                        <input id="descuento_por_cliente_id" name="descuento_por_cliente_id" type="hidden" value="">
                    </div>

                    <div class="form-group">
                        <div class="cols-sm-10">
                            <label for="descuento_id" class="cols-sm-2 control-label">Descuento</label>
                            <select id="descuento_id" name="descuento_id" class="form-control required">
                                <option value="" selected="selected">Seleccione descuento</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="pull-left">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
                    </div>
                    <div class="pull-right">
                        <input type="button" class="btn btn-primary btn-agregar-descuento" value="Guardar">
                    </div>
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
