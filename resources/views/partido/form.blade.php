<div class="form-group {{ $errors->has('provincia') ? 'has-error' : ''}}">
    {!! Form::label('provincia', 'Provincia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('provincia_id', @$provincia , isset($partido) ? $partido->provincia_id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione provincia']) !!}
        {!! $errors->first('provincia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Partido', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', isset($partido) ? $partido->nombre : null, ['class' => 'form-control']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>