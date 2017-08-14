<link rel="stylesheet" href="{{asset('css/bootstrap-table.min.css')}}">
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-table.min.js') }}"></script>

<div class="modal fade" id="clientesModal" tabindex="-1" role="dialog" aria-labelledby="clientesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="clientesModalLabel">Clientes</h4>
            </div>
            <div class="modal-body">
                <table class="table-responsive"
                       id="tableClientes"
                       data-url="#"
                       data-row-style="rowStyle"
                       data-toggle="table"
                       data-show-toggle="true"
                       data-search="true"
                       data-pagination="true" 
                       data-click-to-select="true">
                    <thead>
                        <tr>
                            <th data-field='id' class="hidden">Id</th>
                            <th data-radio='true' class="text-center"></th>
                            <th data-field='tipo_identificacion.descripcion' class="text-center">Tipo Identificacion</th>
                            <th data-field='identificacion' class="text-center">Identificacion</th>
                            <th data-field='tipo_cliente.descripcion' class="text-center">Tipo Cliente</th>
                            <th data-field='razon_social' class="text-center">Razon Social</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr class="clickable-row" data-toggle="collapse" style="cursor: default">
                            <td class="hidden">{{ $cliente->id }}</td>
                            <td><input type='radio' name='radio'></td>
                            <td class="text-center">{{ $cliente->tipoIdentificacion->descripcion }}</td>
                            <td class="text-center">{{ $cliente->identificacion }}</td>
                            <td class="text-center">{{ $cliente->tipoCliente->descripcion }}</td>
                            <td class="text-center">{{ $cliente->razon_social }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="btnClientes" class="btn btn-default">Aceptar</div>

            </div>
        </div>
    </div>
</div>