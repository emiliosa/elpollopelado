<div class="modal fade" id="direccion_modal" role="dialog" aria-labelledby="direccion_modal_label" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="direccion_modal_label">Agregar dirección</h4>
            </div>

            {!! Form::open(['route' => 'direccion.store', 'name' => 'direccion_modal_form'] ) !!}

                <div class="modal-body">

                    <div class="form-group">
                        <input id="direccion_id" name="direccion_id" type="hidden" value="">
                    </div>

                    <div class="form-group">
                        <div class="cols-sm-10">
                            <label for="provincia_id" class="cols-sm-2 control-label">Provincia</label>
                            <select id="provincia_id" name="provincia_id" class="form-control required">
                                <option value="" selected="selected">Seleccione provincia</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="cols-sm-10">
                            <label for="partido_id" class="cols-sm-2 control-label">Partido</label>
                            <select id="partido_id" name="partido_id" class="form-control required">
                                <option value="" selected="selected">Seleccione partido</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="cols-sm-10">
                            <label for="localidad_id" class="cols-sm-2 control-label">Localidad</label>
                            <select id="localidad_id" name="localidad_id" class="form-control required">
                                <option value="" selected="selected">Seleccione localidad</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="cols-sm-10">
                                    <label for="calle" class="cols-sm-2 control-label">Calle</label>
                                    <input class="form-control required" name="calle" id="calle" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="cols-sm-10">
                                    <label for="altura" class="cols-sm-2 control-label">Altura</label>
                                    <input class="form-control required" name="altura" id="altura" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="cols-sm-10">
                                    <label for="piso" class="cols-sm-2 control-label">Piso</label>
                                    <input class="form-control" name="piso" id="piso" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="cols-sm-10">
                                    <label for="dpto" class="cols-sm-2 control-label">Dpto</label>
                                    <input class="form-control" name="dpto" id="dpto" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="cols-sm-10">
                            <label for="entrecalles" class="cols-sm-2 control-label">Entrecalles</label>
                            <input class="form-control required" name="entrecalles" id="entrecalles" type="text">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="pull-left">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
                    </div>
                    <div class="pull-right">
                        <input type="button" class="btn btn-primary btn-agregar-direccion" value="Guardar">
                    </div>
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
