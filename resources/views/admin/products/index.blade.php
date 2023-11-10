@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@can('admin.products.create')
<a class="btn btn-secondary float-right" href="{{ route('admin.products.create') }}">Nuevo producto</a>
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
                        <th>PRECIO</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="" style="max-width: 100px;"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->precio }}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{ route('admin.products.edit', $product) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
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
