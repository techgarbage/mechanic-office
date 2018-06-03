@extends('admin.master')
@section('title', 'Modelos')
@section('main-title')
    {{$model->brand['name']}} {{$model->name}}
@endsection
@section('action-button')
    <a href="{{route('models.edit', ['id' => $model['id']])}}" class="btn btn-primary btn-sm">Editar</a>
@endsection
@section('main')
    @if(isset($message))
        <div class="alert alert-success" role="alert">{{$message}}</div>
    @endif
    @if($model->count()>0)
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Datos de {{$model->brand['name']}} {{$model->name}}
            </div>
            <div class="card-body bg-white">
                <ul>
                    <li><b>Imagen:</b> </li>
                    <li><b>Marca:</b> <a href="{{route('brands.show', ['id' => $model->brand['id']])}}">{{$model->brand['name']}}</a></li>
                    <li><b>Modelo:</b> {{$model->name}}</li>
                    <li><b>Fecha de creación:</b> {{$model->created_at}}</li>
                    <li><b>Actualizado por última vez:</b> {{$model->updated_at}}</li>
                </ul>
            </div>

        </div>
        <div class="card-mb-4 mt-4">
            <div class="card-header bg-white font-weight-bold">
                Vehículos cuyo modelo es {{$model->brand['name']}} {{$model->name}}
            </div>
            <div class="card-body bg-white">
                @if($model->vehicles->count()>0)
                    <ul>
                        @foreach($model->vehicles as $vehicle)
                            <li><a href="{{route('vehicles.show', ['id'=>$vehicle['id']])}}">{{$vehicle->vehicle_registration}}</a> (Propiedad de
                                <a href="{{route('clients.show', ['id'=>$vehicle->client['id']])}}">{{$vehicle->client['name']}} {{$vehicle->client['last_name']}}</a>)</li>
                        @endforeach
                    </ul>
                @else
                    <p>Sin modelos</p>
                @endif
            </div>
        </div>
    @else
        <p> Sorry, you don't see this content. </p>
    @endif
@endsection