<div class="modal fade" id="modal_producto_confirmacion" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="direccionModalLabel">Quitar producto</h4>
            </div>

            <div class="modal-body">
                <input type="hidden" id="producto_rowid_quitar" value=""/>
                <p>
                    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                    ¿Desea quitar el producto seleccionado?
                </p>
            </div>

            <div class="modal-footer">
                <div class="pull-left">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                </div>
                <div class="pull-right">
                    <input type="button" class="btn btn-primary btn-modal-quitar-producto" value="Quitar">
                </div>
            </div>

        </div>
    </div>
</div>
