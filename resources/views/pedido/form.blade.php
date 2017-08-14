<div class="form-group {{ $errors->has('fecha_envio') ? 'has-error' : ''}}">
    {!! Form::label('fecha_envio', 'Fecha envío', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha_envio', isset($pedido) ? $pedido->fecha_envio : \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control datepicker']) !!}
        {!! $errors->first('fecha_envio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@include ('pedido.clientes_modal')

<div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
    {!! Form::label('razon_social', 'Cliente', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('cliente_id', isset($pedido) ? ($pedido->cliente->id) : null, ['id' => 'cliente_id']) !!}
        {!! Form::text('razon_social', isset($pedido) ? ($pedido->cliente->razon_social . ' - ' . $pedido->cliente->identificacion) : null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'razon_social']) !!}
        {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
        <div class="btn btn-link" data-toggle="modal" data-target="#clientesModal">Seleccionar</div>
    </div>
</div>

<div class="form-group {{ $errors->has('descuento_id') ? 'has-error' : ''}}">
    {!! Form::label('descuento_id', 'Descuento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('descuento_id', @$descuentos, isset($pedido) ? $pedido->descuento->id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('descuento_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@include ('pedido.direcciones_modal')

<div class="form-group {{ $errors->has('direccion_envio') ? 'has-error' : ''}}">
    {!! Form::label('direccion_envio', 'Direccion envío', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('direccion_envio_id', isset($pedido) ? ($pedido->direccion->id) : null, ['id' => 'direccion_envio_id']) !!}
        {!! Form::text('direccion_envio', isset($pedido) ? $pedido->direccion_envio->id : null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'direccion_envio']) !!}
        {!! $errors->first('direccion_envio', '<p class="help-block">:message</p>') !!}
        <div class="btn btn-link" data-toggle="modal" data-target="#direccionesModal">Seleccionar</div>
    </div>
</div>

@include ('pedido.productos_modal')

<div class="form-group {{ $errors->has('productos') ? 'has-error' : ''}}">
    {!! Form::label('productos', 'Productos', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('productos', null, ['readonly' => 'readonly', 'class' => 'form-control', 'id' => 'productos']) !!}
        {!! $errors->first('productos', '<p class="help-block">:message</p>') !!}
        <div class="btn btn-link" data-toggle="modal" data-target="#productosModal">Seleccionar</div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>