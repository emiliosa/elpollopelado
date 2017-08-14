<div class="form-group {{ $errors->has('producto') ? 'has-error' : ''}}">
    {!! Form::label('producto', 'Producto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('producto_id', @$productos , isset($unidad_de_venta) ? $unidad_de_venta->producto_id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione producto']) !!}
        {!! $errors->first('producto_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nro_serie') ? 'has-error' : ''}}">
    {!! Form::label('nro_serie', 'Nro. serie', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nro_serie', isset($unidad_de_venta) ? $unidad_de_venta->nro_serie : null, ['class' => 'form-control']) !!}
        {!! $errors->first('nro_serie', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    {!! Form::label('estado', 'Estado', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('estado', @$estados , isset($unidad_de_venta) ? $unidad_de_venta->estado : 0, ['class' => 'form-control' , 'placeholder' => 'Seleccione estado']) !!}
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>