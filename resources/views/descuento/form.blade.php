<div class="form-group {{ $errors->has('Porcentaje') ? 'has-error' : ''}}">
    {!! Form::label('Porcentaje', 'Porcentaje', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('porcentaje', isset($descuento) ? $descuento->porcentaje : null, ['class' => 'form-control']) !!}
        {!! $errors->first('porcentaje', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>