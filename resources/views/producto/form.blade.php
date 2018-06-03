{!! Form::hidden('id', isset($producto) ? ($producto->id) : null, ['id' => 'id']) !!}

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
        <select name="moneda_id" class="form-control" placeholder="" required="required" >
            <option value="" data-simbolo="" selected='selected'>--Seleccione moneda--</option>
            @foreach ($monedas as $moneda)
                @if (isset($producto) && $moneda->id == $producto->moneda_id)
                    @php $selectedOption = "selected='selected'" @endphp
                @else
                    @php $selectedOption = "" @endphp
                @endif
                <option value="{{ $moneda->id }}" data-simbolo="{{ $moneda->simbolo }}" {{ $selectedOption }}>{{ $moneda->denominacion }}</option>
            @endforeach
        </select>
        {!! $errors->first('moneda_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio_unitario') ? 'has-error' : ''}}">
    {!! Form::label('precio_unitario', 'Precio unitario', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('precio_unitario', isset($producto) ? $producto->productoPrecio->first()->getPrecioUnitarioFormatted() : null, ['class' => 'form-control', 'required' => 'required', 'disabled' => 'disabled']) !!}
        {!! $errors->first('precio_unitario', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    {!! Form::label('stock', 'Stock', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('stock', isset($producto) ? $producto->stock : '0', ['class' => 'form-control', 'required' => 'required', 'min' => 1, 'max' => 999999999]) !!}
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
    {!! Form::label('imagen', 'Imagen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <img id="imagen_preview" src="{{ isset($producto) ? Storage::url(str_replace('.jpeg', '_small.jpeg', $producto->imagen)) : NULL }}" alt="Imágen no disponible"  class="img-thumbnail" height="150px" width="150px"/>
        <input id="imagen" name="imagen" type="file">
    </div>
</div>
