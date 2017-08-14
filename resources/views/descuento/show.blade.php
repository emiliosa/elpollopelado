@extends('layouts.app')

@section('title', 'Descuentos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('descuento.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                        <a href="{{ route('descuento.edit', $descuento->id) }}" title="Editar descuento">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['descuento.destroy', $descuento->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar descuento',
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
                                    <th>Porcentaje</th><td>{{ $descuento->porcentaje }}</td>
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