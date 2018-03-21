<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('fecha_envio', 'Fecha envío', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::text('fecha_envio', isset($pedido) ? $pedido->fecha_envio : '', ['required' => 'required', 'class' => 'form-control datepicker', 'placeholder' => 'dd/mm/yyyy']) !!}
                <span class="help-block span-fecha-envio hidden">Ingrese una fecha</span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                @include ('pedido.clientes_modal')
                {!! Form::label('razon_social', 'Cliente', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::hidden('cliente_id', isset($pedido) ? ($pedido->cliente->id) : null, ['id' => 'cliente_id']) !!}
                {!! Form::text('razon_social', isset($pedido) ? ($pedido->cliente->razon_social . ' - ' . $pedido->cliente->identificacion) : null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'razon_social']) !!}
                <span class="help-block span-cliente hidden">Seleccione un cliente</span>
                <div class="btn btn-link" data-toggle="modal" data-target="#clientesModal">Seleccionar</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                {!! Form::label('descuento_id', 'Descuento', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::select('descuento_id', [], isset($pedido) ? $pedido->descuento->id : null, ['required' => 'required', 'class' => 'form-control' , 'placeholder' => 'Seleccione...']) !!}
                <span class="help-block span-descuento hidden">Seleccione un descuento</span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <div class="cols-sm-10">
                @include ('pedido.direcciones_modal')
                {!! Form::label('direccion_envio', 'Direccion envío', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::hidden('direccion_envio_id', isset($pedido) ? ($pedido->direccion->id) : null, ['id' => 'direccion_envio_id']) !!}
                {!! Form::text('direccion_envio', isset($pedido) ? $pedido->direccion_envio->id : null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'direccion_envio']) !!}
                <span class="help-block span-direccion hidden">Seleccione una direccion</span>
                <div class="btn btn-link" data-toggle="modal" data-target="#direccionesModal">Seleccionar</div>
            </div>
        </div>
    </div>
</div>