@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@can('admin.tips.create')
<a class="btn btn-secondary float-right" href="{{ route('admin.tips.create') }}">Nuevo tip</a>
@endcan
    <h1>Lista de productos</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif
    
    <div class="card">
       
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tips as $tip)
                        <tr>
                            <td>{{ $tip->id }}</td>
                            <td><img src="{{ asset('storage/' . $tip->image) }}" alt="" style="max-width: 100px;"></td>
                            <td>{{ $tip->name }}</td>
                            <td>{{ $tip->description }}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{ route('admin.tips.edit', $tip) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tips.destroy', $tip) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
