@extends('admin.master')
@section('title', 'Permisos')
@section('main-title')
    {{$permission->name}}
@endsection
@section('action-button')
    <a href="{{route('permissions.edit', ['id' => $permission['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($permission->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del permiso
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>ID:</b> {{$permission->id}}</li>
                    <li><b>Nombre:</b> {{$permission->name}}</li>
                    <li><b>Slug:</b> {{$permission->slug}}</li>
                    <li><b>Descripción:</b> {{$permission->description}}</li>
                    <li><b>Fecha de creación:</b> {{$permission->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$permission->updated_at}}</li>
                </ul>
            </div>

        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection