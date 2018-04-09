<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('Descripción', 'Descripción', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::text('descripcion', isset($categoria) ? $categoria->descripcion : null, ['class' => 'form-control']) !!}
                {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
