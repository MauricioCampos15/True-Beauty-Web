@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.tips.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del tip" >

                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descripción del tip" >

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

