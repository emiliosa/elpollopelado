<div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('cliente_id', 'Cliente', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::select('cliente_id', @$clientes , isset($descuento_por_cliente) ? $descuento_por_cliente->cliente_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('cliente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descuento_id') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('descuento_id', 'Porcentaje', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::select('descuento_id', @$descuentos , isset($descuento_por_cliente) ? $descuento_por_cliente->descuento_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('descuento_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-xs-offset-10">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>