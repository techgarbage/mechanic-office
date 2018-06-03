@extends('admin.master')
@section('title', 'Roles')
@section('main-title')
    {{$role['name']}}
@endsection
@section('action-button')
    <a href="{{route('roles.edit', ['id' => $role['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($role->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del role
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>ID:</b> {{$role->id}}</li>
                    <li><b>Nombre:</b> {{$role->name}}</li>
                    <li><b>Slug:</b> {{$role->slug}}</li>
                    <li><b>Descripción:</b> {{$role->description}}</li>
                    <li><b>Permiso Especial:</b> {{$role->special}}</li>
                    <li><b>Fecha de creación:</b> {{$role->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$role->updated_at}}</li>
                </ul>
            </div>

        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Permisos del role
            </div>
            <div class="card-body bg-white">
                <ul>
                    @foreach($role->getPermissions() as $value)
                    <li>{{$value}}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection