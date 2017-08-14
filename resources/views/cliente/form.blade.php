<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('tipo_identificacion_id') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('tipo_identificacion_id', 'Tipo identificacion', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::select('tipo_identificacion_id', @$tipos_de_identificacion , isset($cliente) ? $cliente->tipo_identificacion_id : null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                {!! $errors->first('tipo_identificacion_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('tipo_cliente_id') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('tipo_cliente_id', 'Tipo Cliente', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::select('tipo_cliente_id', @$tipos_de_cliente , isset($cliente) ? $cliente->tipo_cliente_id : null, ['class' => 'form-control' , 'placeholder' => 'Seleccione...']) !!}
                {!! $errors->first('tipo_cliente_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('identificacion') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('identificacion', 'Identificacion', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('identificacion', isset($cliente) ? $cliente->identificacion : null, ['class' => 'form-control']) !!}
                {!! $errors->first('identificacion', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">    
        <div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('razon_social', 'Razon Social', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('razon_social', isset($cliente) ? $cliente->razon_social : null, ['class' => 'form-control']) !!}
                {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
            <div class="cols-md-6">
                {!! Form::label('nombre', 'Nombre', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('nombre', isset($cliente) ? $cliente->nombre : null, ['class' => 'form-control']) !!}
                {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
            <div class="cols-sm-6">
                {!! Form::label('apellido', 'Apellido', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('apellido', isset($cliente) ? $cliente->apellido : null, ['class' => 'form-control']) !!}
                {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="cols-sm-10">
        {!! Form::label('email', 'Email', ['class' => 'cols-sm-2 control-label']) !!}
        {!! Form::text('email', isset($cliente) ? $cliente->email : null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('telefono_celular') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('telefono_celular', 'Telefono Celular', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('telefono_celular', isset($cliente) ? $cliente->telefono_celular : null, ['class' => 'form-control']) !!}
                {!! $errors->first('telefono_celular', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group {{ $errors->has('telefono_fijo') ? 'has-error' : ''}}">
            <div class="cols-sm-10">
                {!! Form::label('telefono_fijo', 'Telefono Fijo', ['class' => 'cols-sm-2 control-label']) !!}
                {!! Form::text('telefono_fijo', isset($cliente) ? $cliente->telefono_fijo : null, ['class' => 'form-control']) !!}
                {!! $errors->first('telefono_fijo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-xs-offset-10">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>