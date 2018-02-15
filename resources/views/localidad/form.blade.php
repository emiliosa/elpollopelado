<div class="form-group {{ $errors->has('partido') ? 'has-error' : ''}}">
    {!! Form::label('partido', 'Partido', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('partido_id', isset($localidad) ? $localidad->partido->nombre : null, ['class' => 'form-control' , 'disabled' => true]) !!}
        {!! $errors->first('partido_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', isset($localidad) ? $localidad->nombre : null, ['class' => 'form-control']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codigo_postal') ? 'has-error' : ''}}">
    {!! Form::label('codigo_postal', 'Codigo postal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('codigo_postal', isset($localidad) ? $localidad->codigo_postal : null, ['class' => 'form-control']) !!}
        {!! $errors->first('codigo_postal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>