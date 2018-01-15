<div class="modal fade" id="productosModal" tabindex="-1" role="dialog" aria-labelledby="productosModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="productosModalLabel">Productos</h4>
            </div>
            <div class="modal-body">
                <table class="table table-responsive"
                       id="tableProductos"
                       dara-url="http://localhost:8000/get_productos"
                       data-id-field="id"
                       data-row-style="rowStyle"
                       data-toggle="table"
                       data-show-toggle="true"
                       data-search="true"
                       data-pagination="true" 
                       data-click-to-select="true"
                       data-maintain-selected="true"
                       data-show-footer="false">
                    <thead>
                        <tr>
                            <th data-field='id' class="hidden">Id</th>
                            <th data-field='codigo' class="text-center">Codigo</th>
                            <th data-field='categoria.descripcion' class="text-center">Categoria</th>
                            <th data-field='descripcion' class="text-center">Producto</th>
                            <th data-field='moneda.simbolo' class="text-center">Moneda</th>
                            <th data-field='precio_unitario' class="text-center">Precio</th>
                            <th data-field='stock' class="text-center">Stock</th>
                            <th data-field="action"
                                data-align="center"
                                data-formatter="tableActions"
                                data-events="actionEvents"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                </table>
                <div id="btnProductos" class="btn btn-default">Aceptar</div>

            </div>
        </div>
    </div>
</div>