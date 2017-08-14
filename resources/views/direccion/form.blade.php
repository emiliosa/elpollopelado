<div class="form-group {{ $errors->has('provincia') ? 'has-error' : ''}}">
    {!! Form::label('provincia', 'Provincia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('provincia_id', @$provincia , isset($direccion) ? $direccion->provincia_id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione provincia']) !!}
        {!! $errors->first('provincia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('partido') ? 'has-error' : ''}}">
    {!! Form::label('partido', 'Partido', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('partido_id', isset($partido) ? @$partido : [], isset($direccion) ? $direccion->partido_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione partido']) !!}
        {!! $errors->first('partido_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('localidad') ? 'has-error' : ''}}">
    {!! Form::label('localidad', 'Localidad', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('localidad_id', isset($localidad) ? @$localidad : [], isset($direccion) ? $direccion->localidad_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione localidad']) !!}
        {!! $errors->first('localidad_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('calle') ? 'has-error' : ''}}">
    {!! Form::label('calle', 'Calle', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('calle', isset($direccion) ? $direccion->calle : null, ['class' => 'form-control']) !!}
        {!! $errors->first('calle', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('altura') ? 'has-error' : ''}}">
    {!! Form::label('altura', 'Altura', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('altura', isset($direccion) ? $direccion->altura : null, ['class' => 'form-control']) !!}
        {!! $errors->first('altura', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('piso') ? 'has-error' : ''}}">
    {!! Form::label('piso', 'Piso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('piso', isset($direccion) ? $direccion->piso : null, ['class' => 'form-control']) !!}
        {!! $errors->first('piso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dpto') ? 'has-error' : ''}}">
    {!! Form::label('dpto', 'Dpto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dpto', isset($direccion) ? $direccion->dpto : null, ['class' => 'form-control']) !!}
        {!! $errors->first('dpto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('entrecalles') ? 'has-error' : ''}}">
    {!! Form::label('entrecalles', 'Entrecalles', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('entrecalles', isset($direccion) ? $direccion->entrecalles : null, ['class' => 'form-control']) !!}
        {!! $errors->first('entrecalles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>