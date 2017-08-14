<div class="modal fade" id="descuentoModal" tabindex="-1" role="dialog" aria-labelledby="descuentoModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="descuentoModalLabel">Agregar nuevo descuento</h4>
            </div>

            {!! Form::open(['route' => 'descuento_por_cliente.store', 'id' => 'descuento_form_modal'] ) !!}

                <div class="modal-body">

                    <div class="form-group">
                        <input id="cliente_id" name="cliente_id" type="hidden" value="{{ $cliente->id }}">
                        <input id="descuento_por_cliente_id" name="descuento_por_cliente_id" type="hidden" value="">
                    </div>

                    <div class="form-group">
                        <div class="cols-sm-10">
                            <label for="descuento_id" class="cols-sm-2 control-label">Descuento</label>
                            <select id="descuento_id" name="descuento_id" class="form-control">
                                <option value="" selected="selected">Seleccione descuento</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
                    <input type="submit" class="btn btn-primary" id="btn_submit_descuento" data-op="" value="">
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>