@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" placeholder="Nombre del producto" >

              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio" value="{{ $product->precio }}" placeholder="Nombre del producto" >

                @error('precio')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Imagen actual</label>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" style="max-width: 100px;">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="image">Cargar nueva imagen (opcional)</label>
                <input class="form-control" type="file" id="image" name="image">
                
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar producto</button>
        </form>

    </div>
</div>
@stop

