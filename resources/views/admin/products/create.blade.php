@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del producto" >

                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="Nombre del producto" >

                    @error('precio')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Imagen</label>
                    <input class="form-control" type="file" id="image" name="image">
                  </div>
                <button type="submit" class="btn btn-primary">Crear producto</button>
            </form>
        </div>
    </div>
@stop

