@extends('admin.master')
@section('title', 'Usuarios')
@section('main-title')
    {{$user['name']}}
@endsection
@section('action-button')
    <a href="{{route('users.edit', ['id' => $user['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($user->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del usuario
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>ID:</b> {{$user->id}}</li>
                    <li><b>Nombre:</b> {{$user->name}}</li>
                    <li><b>Email / DNI:</b> {{$user->email}}</li>
                    <li><b>Fecha de creación:</b> {{$user->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$user->updated_at}}</li>
                </ul>
            </div>

        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Roles del usuario
            </div>
            <div class="card-body bg-white">
                <ul>
                    @foreach($user->getRoles() as $value)
                        <li>{{$value}}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection