<div class="modal fade" id="direccionesModal" tabindex="-1" role="dialog" aria-labelledby="direccionesModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="direccionesModalLabel">Direcciones</h4>
            </div>
            <div class="modal-body">
                <table class="table table-responsive"
                       id="tableDirecciones"
                       data-row-style="rowStyle"
                       data-toggle="table"
                       data-show-refresh="true"
                       data-show-toggle="true"
                       data-show-columns="true" 
                       data-search="true"
                       data-pagination="true" 
                       data-sort-name="razon_social"
                       data-click-to-select="true"
                       data-maintain-selected="true">
                    <thead>
                        <tr>
                            <th data-field='id' class="hidden">Id</th>
                            <th data-radio='true' class="text-center"></th>
                            <th data-field='provincia.nombre' class="text-center">Provincia</th>
                            <th data-field='partido.nombre' class="text-center">Partido</th>
                            <th data-field='localidad.nombre' class="text-center">Localidad</th>
                            <th data-field='calle' class="text-center">Calle</th>
                            <th data-field='altura' class="text-center">Altura</th>
                            <th data-field='piso' class="text-center">Piso</th>
                            <th data-field='dpto' class="text-center">Dpto.</th>
                            <th data-field='entrecalles' class="text-center">Entrecalles</th>
                        </tr>
                    </thead>
                </table>
                <div id="btnDirecciones" class="btn btn-default">Aceptar</div>

            </div>
        </div>
    </div>
</div>