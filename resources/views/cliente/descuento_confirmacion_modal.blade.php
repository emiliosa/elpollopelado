<div class="modal fade" id="modal_descuento_confirmacion" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="direccion_modal_label">Borrar descuento</h4>
            </div>

            <div class="modal-body">
                <input type="hidden" id="descuento_id_borrar" value=""/>
                <p>
                    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                    ¿Desea eliminar el descuento seleccionado?
                </p>
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
                <input type="button" class="btn btn-primary" id="btn_modal_borrar_descuento" value="Borrar">
            </div>

        </div>
    </div>
</div>