@extends('admin.master')
@section('title', 'Vehiculos')
@section('main-title', 'Todos los Vehiculos')
@section('action-button')
    <a href="{{route('vehicles.create')}}" class="btn btn-primary btn-sm">Nuevo vehículo</a>
    <form action="" method="GET" class="col-3 d-inline-block input-group float-right"><input type="search" name="search" class="form-control w-75 input-sm float-right" style="display: inline-block!important" placeholder="Búsqueda por matrícula, cliente o modelo" value="{{(isset ($_GET['search'])) ?  $_GET['search'] : ''}}"></form>

@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if(session('destroyed'))
        <div class="alert alert-success" role="alert">{{session('destroyed')}}</div>
    @endif
    @if(count($vehicles)>0)

        <table class="table table-hover table-bordered table-responsive-lg mt-3">
            <thead>
            <tr>
                <th scope="col">Matrícula</th>
                <th scope="col">Cliente</th>
                <th scope="col">Modelo</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Última actualización</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vehicles as $item)
                <tr>
                    <th scope="row">{{$item->vehicle_registration}}</th>
                    <td><a href="{{route('clients.show', ['id' => $item->client['id']])}}">{{$item->client->name.' '.$item->client->last_name}}</a></td>
                    <td><a href="{{route('models.show', ['id' => $item->model['id']])}}">{{$item->model->brand->name.' '.$item->model->name}}</a> </td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class=" actions" valign="middle" align="center">
                        <a href="{{route('vehicles.show', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="" data-original-title="Ver"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{route('vehicles.edit', ['id' => $item['id']])}}" class="btn btn-icon btn-pill btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn btn-icon btn-pill btn-danger" href="{{route('vehicles.destroy', ['id' => $item['id']])}}" data-toggle="tooltip" title="" data-original-title="Eliminar" onclick="event.preventDefault(); document.getElementById('destroy_{{$item['id']}}').submit();">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>

                        <form id="destroy_{{$item['id']}}" action="{{route('vehicles.destroy', ['id' => $item['id']])}}" method="POST" style="display: none;">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$vehicles->render()!!}

    @else
        <p> Sorry, vehicles' table is empty. </p>
    @endif
@endsection