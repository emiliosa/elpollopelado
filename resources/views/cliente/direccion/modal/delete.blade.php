<div class="modal fade" id="modal_direccion_confirmacion" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="direccionModalLabel">Borrar dirección</h4>
            </div>

            <div class="modal-body">
                <input type="hidden" id="direccion_id_borrar" value=""/>
                <p>
                    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                    ¿Desea eliminar la dirección seleccionada?
                </p>
            </div>

            <div class="modal-footer">
                <div class="pull-left">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="pull-right">
                    <input type="button" class="btn btn-primary btn-modal-borrar-direccion" value="Borrar">
                </div>
            </div>

        </div>
    </div>
</div>
