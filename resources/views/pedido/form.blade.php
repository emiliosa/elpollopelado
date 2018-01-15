<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('fecha_envio') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('fecha_envio', 'Fecha envío', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::date('fecha_envio', isset($pedido) ? $pedido->fecha_envio : \Carbon\Carbon::now()->format('d/m/Y'), ['class' => 'form-control datepicker']) !!}
                {!! $errors->first('fecha_envio', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                @include ('pedido.clientes_modal')
                {!! Form::label('razon_social', 'Cliente', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::hidden('cliente_id', isset($pedido) ? ($pedido->cliente->id) : null, ['id' => 'cliente_id']) !!}
                {!! Form::text('razon_social', isset($pedido) ? ($pedido->cliente->razon_social . ' - ' . $pedido->cliente->identificacion) : null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'razon_social']) !!}
                {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
                <div class="btn btn-link" data-toggle="modal" data-target="#clientesModal">Seleccionar</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('descuento_id') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('descuento_id', 'Descuento', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::select('descuento_id', @$descuentos, isset($pedido) ? $pedido->descuento->id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione...']) !!}
                {!! $errors->first('descuento_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('direccion_envio') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                @include ('pedido.direcciones_modal')
                {!! Form::label('direccion_envio', 'Direccion envío', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::hidden('direccion_envio_id', isset($pedido) ? ($pedido->direccion->id) : null, ['id' => 'direccion_envio_id']) !!}
                {!! Form::text('direccion_envio', isset($pedido) ? $pedido->direccion_envio->id : null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'direccion_envio']) !!}
                {!! $errors->first('direccion_envio', '<p class="help-block">:message</p>') !!}
                <div class="btn btn-link" data-toggle="modal" data-target="#direccionesModal">Seleccionar</div>
            </div>
        </div>
    </div>
</div>