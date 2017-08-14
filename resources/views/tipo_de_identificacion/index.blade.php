@extends('layouts.app')

@section('title', 'Tipos de Identificación')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('tipo_de_identificacion.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo Tipo de Identificación">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableTipoDeIdentificacion">
                                <thead>
                                <tr>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tipos_de_identificacion as $tipo_de_identificacion)
                                    <tr>
                                        <td class="text-center">{{ $tipo_de_identificacion->descripcion}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('tipo_de_identificacion.show', $tipo_de_identificacion->id) }}" title="Ver Tipo de Identificación">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('tipo_de_identificacion.edit', $tipo_de_identificacion->id) }}" title="Editar Tipo de Identificación">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['tipo_de_identificacion.destroy', $tipo_de_identificacion->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar Tipo de Cliente',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection