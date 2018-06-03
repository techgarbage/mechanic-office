@extends('admin.master')
@section('title', 'Clientes')
@section('main-title')
{{$client->name}} {{$client->last_name}}
@endsection
@section('action-button')
    <a href="{{route('clients.edit', ['id' => $client['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($client->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos personales
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>DNI:</b> {{$client->dni}}</li>
                    <li><b>Ciudad:</b> {{$client->city}}</li>
                    <li><b>Dirección:</b> {{$client->address}}</li>
                    <li><b>Código postal:</b> {{$client->postal_code}}</li>
                    <li><b>Teléfono:</b> {{$client->phone}}</li>
                    <li><b>Fecha de creación:</b> {{$client->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$client->updated_at}}</li>
                </ul>
            </div>

        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Vehiculos
            </div>
            <div class="card-body bg-white">
                @if($client->vehicles->count()>0)
                @foreach($client->vehicles as $vehicle)
                    <h5 class="card-title">{{$vehicle->model->brand->name}} {{$vehicle->model->name}}</h5>
                    <p>Matricula {{$vehicle->vehicle_registration}}</p>
                @endforeach
                @else
                    <p>Sin vehículos</p>
                @endif
            </div>
        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection