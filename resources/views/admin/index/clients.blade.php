@extends('admin.master')
@section('title', 'Clientes')
@section('main-title', 'Todos los Clientes')
@section('action-button')
    <a href="{{route('clients.create')}}" class="btn btn-primary btn-sm">Nuevo cliente</a>
    <form action="" method="GET" class="col-3 d-inline-block input-group float-right"><input type="search" name="search" class="form-control w-50 input-sm float-right" style="display: inline-block!important" placeholder="Búsqueda"></form>

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
    @if(count($clients)>0)

        <table class="table table-hover table-bordered table-responsive-lg mt-3">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Última actualización</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $item)
                    <tr>
                        <th scope="row">{{$item->dni}}</th>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['last_name']}}</td>
                        <td>{{$item['city']}}</td>
                        <td>{{$item['phone']}}</td>
                        <td>{{$item['created_at']}}</td>
                        <td>{{$item['updated_at']}}</td>
                        <td class=" actions" valign="middle" align="center">
                            <a href="{{route('clients.show', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="" data-original-title="Ver"><i class="fa fa-fw fa-eye"></i></a>
                            <a href="{{route('clients.edit', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                            <a class="btn btn-icon btn-pill btn-danger" href="{{route('clients.destroy', ['id' => $item['id']])}}" data-toggle="tooltip" title="" data-original-title="Eliminar" onclick="event.preventDefault(); document.getElementById('destroy_{{$item['id']}}').submit();">
                                <i class="fa fa-fw fa-trash"></i>
                            </a>

                            <form id="destroy_{{$item['id']}}" action="{{route('clients.destroy', ['id' => $item['id']])}}" method="POST" style="display: none;">
                                @csrf
                                {{method_field('DELETE')}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {!!$clients->render()!!}

    @else
        <p> Sorry, clients' table is empty. </p>
    @endif
@endsection