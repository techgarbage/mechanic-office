@extends('admin.master')
@section('title', 'Facturas')
@section('main-title', 'Todas las Facturas')
@section('action-button')
    <a href="{{route('invoices.create')}}" class="btn btn-primary btn-sm">Nueva factura</a>
    <form action="" method="GET" class="col-3 d-inline-block input-group float-right"><input type="search" name="search" class="form-control w-75 input-sm float-right" style="display: inline-block!important" placeholder="Búsqueda por cliente o matrícula"></form>

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
    @if(count($invoices)>0)

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
            @foreach($invoices as $item)
                <tr>
                    <th scope="row">{{$item->vehicle->client->dni}}</th>
                    <td>{{$item->vehicle->client->name}}</td>
                    <td>{{$item->vehicle->client->last_name}}</td>
                    <td>{{$item->vehicle->client->city}}</td>
                    <td>{{$item->vehicle->client->phone}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class=" actions" valign="middle" align="center">
                        <a href="{{route('invoices.show', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="" data-original-title="Ver"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{route('invoices.edit', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn btn-icon btn-pill btn-danger" href="{{route('invoices.destroy', ['id' => $item['id']])}}" data-toggle="tooltip" title="" data-original-title="Eliminar" onclick="event.preventDefault(); document.getElementById('destroy_{{$item['id']}}').submit();">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>

                        <form id="destroy_{{$item['id']}}" action="{{route('invoices.destroy', ['id' => $item['id']])}}" method="POST" style="display: none;">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$invoices->render()!!}

    @else
        @if(isset($_GET['search']))
            <p>No se encontraron datos en la búsqueda</p>
        @else
            <p> Sorry, invoices' table is empty. </p>
        @endif
    @endif
@endsection