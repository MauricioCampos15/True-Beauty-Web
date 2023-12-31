@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

    @if(session('info'))
    <div class="alert alert-success">
        <strong>{{(session('info'))}}</strong>
    </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}

                    @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <h2 class="h3">Lista de permisos</h2>
                @foreach ($permissions as $permission)
                    <div>
                        <label for="">
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            {{ $permission->description }}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
