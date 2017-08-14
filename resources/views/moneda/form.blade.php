<div class="form-group {{ $errors->has('denominacion') ? 'has-error' : ''}}">
    {!! Form::label('denominacion', 'Denominación', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('denominacion', isset($moneda) ? $moneda->denominacion : null, ['class' => 'form-control']) !!}
        {!! $errors->first('denominacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    {!! Form::label('codigo', 'Código', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('codigo', isset($moneda) ? $moneda->codigo : null, ['class' => 'form-control']) !!}
        {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('simbolo') ? 'has-error' : ''}}">
    {!! Form::label('simbolo', 'Símbolo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('simbolo', isset($moneda) ? $moneda->simbolo : null, ['class' => 'form-control']) !!}
        {!! $errors->first('simbolo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>