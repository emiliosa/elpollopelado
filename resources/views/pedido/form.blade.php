<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('fecha_envio', 'Fecha envío', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::text('fecha_envio', isset($pedido) ? $pedido->fecha_envio : '', ['required' => 'required', 'class' => 'form-control datepicker', 'placeholder' => 'dd/mm/yyyy']) !!}
                {!! $errors->first('fecha_envio', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('cliente_id', 'Cliente', ['class' => 'col-md-4 control-label']) !!}
                <select name="cliente_id" class="form-control" placeholder="" required="required" >
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
                <select name="descuento_id" class="form-control" placeholder="" >
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
                <select name="direccion_envio_id" class="form-control" placeholder="" required="required" >
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
