@extends('admin.master')
@section('title', 'Roles')
@section('main-title', 'Todos los Roles')
@section('action-button')
    <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm">Nuevo role</a>
    <form action="" method="GET" class="col-3 d-inline-block input-group float-right"><input type="search" name="search" class="form-control w-75 input-sm float-right" style="display: inline-block!important" placeholder="Búsqueda" value="{{(isset ($_GET['search'])) ?  $_GET['search'] : ''}}"></form>

@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if(session('destroyed'))
        <div class="alert alert-success" role="alert">{{session('destroyed')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
    @endif
    @if(count($roles)>0)

        <table class="table table-hover table-bordered table-responsive-lg mt-3">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Slug</th>
                <th scope="col">Descripción</th>
                <th scope="col">Permisos especiales</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Última actualización</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->special}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class=" actions" valign="middle" align="center">
                        <a href="{{route('roles.show', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="" data-original-title="Ver"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{route('roles.edit', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn btn-icon btn-pill btn-danger" href="{{route('roles.destroy', ['id' => $item['id']])}}" data-toggle="tooltip" title="" data-original-title="Eliminar" onclick="event.preventDefault(); document.getElementById('destroy_{{$item['id']}}').submit();">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>

                        <form id="destroy_{{$item['id']}}" action="{{route('roles.destroy', ['id' => $item['id']])}}" method="POST" style="display: none;">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$roles->render()!!}

    @else
        <p> Sorry, brands' table is empty. </p>
    @endif
@endsection