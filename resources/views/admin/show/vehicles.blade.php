@extends('admin.master')
@section('title', 'Vehículos')
@section('main-title')
    {{$vehicle->model->brand['name']}} {{$vehicle->model['name']}}
@endsection
@section('action-button')
    <a href="{{route('vehicles.edit', ['id' => $vehicle['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($vehicle->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del vehículo
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>Matrícula:</b> {{$vehicle->vehicle_registration}}</li>
                    <li><b>Marca:</b> {{$vehicle->model->brand['name']}}</li>
                    <li><b>Modelo:</b> {{$vehicle->model['name']}}</li>
                    <li><b>Fecha de creación:</b> {{$vehicle->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$vehicle->updated_at}}</li>
                </ul>
            </div>

        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos del propietario
            </div>
            <div class="card-body bg-white">
                <?php $client = $vehicle->client ?>
                <ul>
                    <li><b>DNI:</b> {{$client->dni}}</li>
                    <li><b>Nombre:</b> {{$client->name}}</li>
                    <li><b>Apellidos:</b> {{$client->last_name}}</li>
                    <li><b>Ciudad:</b> {{$client->city}}</li>
                    <li><b>Dirección:</b> {{$client->address}}</li>
                    <li><b>Código postal:</b> {{$client->postal_code}}</li>
                    <li><b>Teléfono:</b> {{$client->phone}}</li>
                    <li><b>Fecha de creación:</b> {{$client->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$client->updated_at}}</li>
                </ul>
                    <a href="{{route('clients.show', ['id' => $client['id']])}}">Ver perfil de {{$client->name}} {{$client->last_name}}</a>
            </div>
        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Facturas del vehículo
            </div>
            <div class="card-body bg-white">
                <?php $invoices = $vehicle->invoices ?>
                <ul>
                    @foreach($vehicle->invoices as $invoice)
                        @php($invoice_vehicle = \App\Vehicle::find($invoice['vehicle_id']))
                        <li><a href="{{route('invoices.show', ['id' => $invoice['id']])}}">{{date('d-m-Y',strtotime($invoice_vehicle->created_at))}} ({{$invoice->vehicle_kilometers}} km)</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection