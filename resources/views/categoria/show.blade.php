@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('categoria.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                        <a href="{{ route('categoria.edit', $categoria->id) }}" title="Editar categoría">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['categoria.destroy', $categoria->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar categoría',
                            'onclick'=>'return confirm("Confirmar eliminación?")'
                            )) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>Descripción</th><td>{{ $categoria->descripcion }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection