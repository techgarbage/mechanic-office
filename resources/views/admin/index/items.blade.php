@extends('admin.master')
@section('title', 'Artículos')
@section('main-title', 'Todos los Artículos')
@section('action-button')
    <a href="{{route('items.create')}}" class="btn btn-primary btn-sm">Nuevo artículo</a>
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
    @if(count($items)>0)

        <table class="table table-hover table-bordered table-responsive-lg mt-3">
            <thead>
            <tr>
                <th scope="col">Referencia</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{$item->reference}}</th>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}} <small>EUR</small></td>
                    <td class=" actions" valign="middle" align="center">
                        <a href="{{route('items.show', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="" data-original-title="Ver"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{route('items.edit', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn btn-icon btn-pill btn-danger" href="{{route('items.destroy', ['id' => $item['id']])}}" data-toggle="tooltip" title="" data-original-title="Eliminar" onclick="event.preventDefault(); document.getElementById('destroy_{{$item['id']}}').submit();">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>

                        <form id="destroy_{{$item['id']}}" action="{{route('items.destroy', ['id' => $item['id']])}}" method="POST" style="display: none;">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$items->render()!!}

    @else
        <p> Sorry, items' table is empty. </p>
    @endif
@endsection