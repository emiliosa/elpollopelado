<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    {!! Form::label('codigo', 'Código', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id', isset($producto) ? ($producto->id) : null, ['id' => 'id']) !!}
        {!! Form::text('codigo', isset($producto) ? $producto->codigo : null, ['class' => 'form-control']) !!}
        {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
    {!! Form::label('categoria', 'Categoría', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('categoria_id', @$categorias , isset($producto) ? $producto->categoria_id : null, ['class' => 'form-control' , 'required' => 'required', 'placeholder' => 'Seleccione categoría']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    {!! Form::label('descripcion', 'Descripción', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('descripcion', isset($producto) ? $producto->descripcion : null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('observaciones') ? 'has-error' : ''}}">
    {!! Form::label('observaciones', 'Observaciones', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('observaciones', isset($producto) ? $producto->observaciones : null, ['class' => 'form-control']) !!}
        {!! $errors->first('observaciones', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('moneda') ? 'has-error' : ''}}">
    {!! Form::label('moneda', 'Moneda', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('moneda_id', @$monedas , isset($producto) ? $producto->moneda_id : null, ['class' => 'form-control' , 'required' => 'required', 'placeholder' => 'Seleccione moneda']) !!}
        {!! $errors->first('moneda_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio_unitario') ? 'has-error' : ''}}">
    {!! Form::label('precio_unitario', 'Precio unitario', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('precio_unitario', isset($producto) ? $producto->precio_unitario : '0', ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('precio_unitario', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    {!! Form::label('stock', 'Stock', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('stock', isset($producto) ? $producto->stock : '0', ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
    {!! Form::label('imagen', 'Imagen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <img id="imagen-preview" src="{!! isset($producto) ? Storage::url(str_replace('.jpeg', '_small.jpeg', $producto->imagen)) : NULL !!}" alt="Imágen no disponible"  class="img-thumbnail" height="150px" width="150px"/>
        <input id="imagen" name="imagen" type="file">
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>