@push('javascript')
    <script type="text/javascript">
        $(function () {
            $(".datetimepicker").datetimepicker({
                minDate: moment(),
                format: 'DD/MM/YYYY HH:mm:00',
                locale: 'es'
            });
        });
    </script>
@endpush

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('fecha_envio', 'Fecha envío', ['class' => 'control-label']) !!}
                <div class="input-group date datetimepicker">
                    <input type='text' class="form-control" id="fecha_envio" name="fecha_envio"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                {!! $errors->first('fecha_envio', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('cliente_id', 'Cliente', ['class' => 'col-md-4 control-label']) !!}
                <select id="cliente_id" name="cliente_id" class="form-control" placeholder="" required="required" >
                    <option value="" data-simbolo="" selected='selected'>--Seleccione cliente--</option>
                    @foreach ($clientes as $cliente)
                        @if (isset($pedido) && $pedido->cliente_id == $cliente->id)
                            @php $selectedOption = "selected='selected'" @endphp
                        @else
                            @php $selectedOption = "" @endphp
                        @endif
                        @if (!empty($cliente->razon_social))
                            @php $clienteDeno = $cliente->razon_social @endphp
                        @else
                            @php $clienteDeno = $cliente->apellido . ' ' .  $cliente->nombre @endphp
                        @endif
                        <option value="{{ $cliente->id }}" {{ $selectedOption }}>{{ $clienteDeno . ' - ' . $cliente->identificacion }}</option>
                    @endforeach
                </select>
                {!! $errors->first('cliente_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('descuento_id', 'Descuento', ['class' => 'col-md-4 control-label']) !!}
                <select id="descuento_id" name="descuento_id" class="form-control" placeholder="" >
                    <option value="" data-simbolo="" selected='selected'>--Seleccione descuento--</option>
                    @if (isset($descuentos))
                        @foreach ($descuentos as $descuento)
                            @if (isset($pedido) && $pedido->descuento_id == $descuento->id)
                                @php $selectedOption = "selected='selected'" @endphp
                            @else
                                @php $selectedOption = "" @endphp
                            @endif
                            <option value="{{ $descuento->id }}" {{ $selectedOption }}>{{ $descuento->porcentaje }}</option>
                        @endforeach
                    @endif
                </select>
                {!! $errors->first('descuento_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('direccion_envio_id', 'Direccion envío', ['class' => 'col-md-4 control-label']) !!}
                <select id="direccion_envio_id" name="direccion_envio_id" class="form-control" placeholder="" required="required" >
                    <option value="" data-simbolo="" selected='selected'>--Seleccione direccion--</option>
                    @if (isset($direcciones))
                        @foreach ($direcciones as $direccion)
                            @if (isset($pedido) && $pedido->direccion_envio_id == $direccion->id)
                                @php $selectedOption = "selected='selected'" @endphp
                            @else
                                @php $selectedOption = "" @endphp
                            @endif
                            @php $direccionDeno =
                                $direccion->localidad->partido->provincia->nombre . ', ' .
                                $direccion->localidad->partido->nombre . ', ' .
                                $direccion->localidad->nombre . ', ' .
                                $direccion->calle . ' ' . $direccion->altura;
                             @endphp
                            <option value="{{ $direccion->id }}" {{ $selectedOption }}>{{ $direccionDeno }}</option>
                        @endforeach
                    @endif
                </select>
                {!! $errors->first('direccion_envio_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
