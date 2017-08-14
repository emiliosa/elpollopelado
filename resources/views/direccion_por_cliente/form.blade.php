<div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('cliente_id', 'Cliente', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::select('cliente_id', @$clientes , isset($direccion_por_cliente) ? $direccion_por_cliente->cliente_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('cliente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('provincia') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('provincia', 'Provincia', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::select('provincia_id', @$direcciones->provincias , isset($direccion_por_cliente) ? $direccion_por_cliente->direccion->provincia_id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('provincia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('partido') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('partido', 'Partido', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::select('partido_id', isset($partido) ? @$partidos : [], isset($direccion_por_cliente) ? $direccion_por_cliente->direccion->partido_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('partido_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    
<div class="form-group {{ $errors->has('localidad') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('localidad', 'Localidad', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::select('localidad_id', isset($localidad) ? @$localidades : [], isset($direccion_por_cliente) ? $direccion_por_cliente->direccion->localidad_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
        {!! $errors->first('localidad_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('calle') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('calle', 'Calle', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('calle', isset($direccion_por_cliente) ? $direccion_por_cliente->calle : null, ['class' => 'form-control']) !!}
                {!! $errors->first('calle', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('altura') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('altura', 'Altura', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('altura', isset($direccion_por_cliente) ? $direccion_por_cliente->altura : null, ['class' => 'form-control']) !!}
                {!! $errors->first('altura', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('piso') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('piso', 'Piso', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('piso', isset($direccion) ? $direccion->piso : null, ['class' => 'form-control']) !!}
                {!! $errors->first('piso', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('dpto') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('dpto', 'Dpto', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('dpto', isset($direccion) ? $direccion->dpto : null, ['class' => 'form-control']) !!}
                {!! $errors->first('dpto', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('entrecalles') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('entrecalles', 'Entrecalles', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('entrecalles', isset($direccion) ? $direccion->entrecalles : null, ['class' => 'form-control']) !!}
        {!! $errors->first('entrecalles', '<p class="help-block">:message</p>') !!}
    </div>
</div>